<?php 
namespace App\Services;

use App\Http\Requests\PostRequest;
use App\Interfaces\PostServiceInterface;
use App\Models\Post;

class PostService implements PostServiceInterface
{
    public function createPost(PostRequest $request) {
        $validated = $request->validated();

        $post = auth()->user()->posts()->create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'cover_image' => $request->file('cover_image')->store('images'),
            'pinned' => $validated['pinned'],
        ]);

        $post->tags()->attach($validated['tags']);
        return $post;
    }

    public function getPostById($id){
        $post = Post::with('tags')->findOrFail($id);
        $this->authorize('view', $post);
        return $post;   
    } 

    public function updatePost(PostRequest $request, $id) {
        $post = Post::findOrFail($id);
        $this->authorize('update', $post);

        $validated = $request->validated();

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('images');
        }

        $post->update($validated);
        if ($request->has('tags')) {
            $post->tags()->sync($validated['tags']);
        }
        return $post;
    }

    public function deletePost($id) {
        $post = Post::findOrFail($id);
        if(!$post){
            return false;
        }
        $this->authorize('delete', $post);
        $post->delete();
        return true;
    }
    public function restorePost($id) {
        $post = Post::withTrashed()->findOrFail($id);
        if(!$post){
            return false;
        }
        $this->authorize('restore', $post);
        $post->restore();
        return true;
    }
    public function getAllPosts() {
        return Post::with('tags')->get();
    }
}