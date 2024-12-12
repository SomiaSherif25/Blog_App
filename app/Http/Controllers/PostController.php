<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return auth()->user()->posts()->with('tags')->get();
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'cover_image' => 'required|image',
            'pinned' => 'required|boolean',
            'tags' => 'required|array',
        ]);

        $post = auth()->user()->posts()->create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'cover_image' => $request->file('cover_image')->store('images'),
            'pinned' => $validated['pinned'],
        ]);

        $post->tags()->attach($validated['tags']);
        return $post;
    }

    public function show(Post $post) {
        $this->authorize('view', $post);
        return $post->load('tags');
    }

    public function update(Request $request, Post $post) {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'body' => 'sometimes|required|string',
            'cover_image' => 'sometimes|image',
            'pinned' => 'sometimes|required|boolean',
            'tags' => 'sometimes|array',
        ]);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('images');
        }

        $post->update($validated);
        if ($request->has('tags')) {
            $post->tags()->sync($validated['tags']);
        }

        return $post;
    }

    public function destroy(Post $post) {
        $this->authorize('delete', $post);
        $post->delete();
        return response()->json(['message' => 'Post soft deleted']);
    }

    public function restore($id) {
        $post = Post::onlyTrashed()->findOrFail($id);
        $this->authorize('restore', $post);
        $post->restore();
        return response()->json(['message' => 'Post restored']);
    }
}
