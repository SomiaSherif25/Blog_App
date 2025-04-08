<?php 

namespace App\Interfaces;

use App\Http\Requests\PostRequest;

interface PostServiceInterface{
    public function getAllPosts();
    public function createPost(PostRequest $request);
    public function getPostById($id);
    public function updatePost(PostRequest $request, $id);
    public function deletePost($id);
    public function restorePost($id);
}