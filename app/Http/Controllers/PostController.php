<?php

namespace App\Http\Controllers;

use App\Facades\PostFacade;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\ApiResponseFormat;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public $ApiResponseFormat;

    public function __construct(){
        $this->ApiResponseFormat=new ApiResponseFormat();
    }
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $posts = PostResource::collection(PostFacade::getAllPosts());
        return $this->ApiResponseFormat->success($posts, 'Posts retrieved successfully');
    }

    public function store(PostRequest $request) {
        $posts = PostFacade::createPost($request);
        return $this->ApiResponseFormat->success($posts, 'Post created successfully');
    }

    public function show($id) {
       $post = PostFacade::getPostById($id);
        return $this->ApiResponseFormat->success($post, 'Post retrieved successfully');
    }

    public function update(PostRequest $request, $id) {
        $post = PostFacade::updatePost($request, $id);
        return $this->ApiResponseFormat->success($post, 'Post updated successfully');
    }

    public function destroy($id) {
        $post = PostFacade::deletePost($id);
        if(!$post){
            return $this->ApiResponseFormat->error('Post not found', 404);
        }
        return $this->ApiResponseFormat->success(null, 'Post deleted successfully');
    }

    public function restore($id) {
        $post = PostFacade::restorePost($id);
        if(!$post){
            return $this->ApiResponseFormat->error('Post not found', 404);
        }
        return $this->ApiResponseFormat->success(null, 'Post restored successfully');
    }
}
