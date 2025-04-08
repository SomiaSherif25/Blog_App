<?php
namespace App\Services;

use App\Http\Requests\TagRequest;
use App\Interfaces\TagServiceInterface;
use App\Models\Tag;

class TagService implements TagServiceInterface
{
    public function getAllTags(){
        $tags = Tag::all();
        return $tags;
    }
    public function createTag(TagRequest $request){
        $validated = $request->validated();
        $tag = Tag::create($validated);
        return $tag;
    }
    public function updateTag(TagRequest $request, Tag $tag){
        $validated = $request->validated();
        $tag->update($validated);
        return $tag;
    }
    public function deleteTag(Tag $tag){
        if(!$tag){
            return false;
        }
        $tag->delete();
        return true;
    }
}