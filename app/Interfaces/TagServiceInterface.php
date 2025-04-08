<?php 
namespace App\Interfaces;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResgisterRequest;
use App\Http\Requests\TagRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

interface TagServiceInterface{
    public function getAllTags();
    public function createTag(TagRequest $request);
    public function updateTag(TagRequest $request, Tag $tag);
    public function deleteTag(Tag $tag);
}