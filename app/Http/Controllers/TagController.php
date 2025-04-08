<?php

namespace App\Http\Controllers;

use App\Facades\TagFacade;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Services\ApiResponseFormat;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public $ApiResponseFormat;

    public function __construct(){
        $this->ApiResponseFormat=new ApiResponseFormat();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TagFacade::getAllTags();
        return $this->ApiResponseFormat->success($data, 'Tags retrieved successfully');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        $data = TagFacade::createTag($request);
        return $this->ApiResponseFormat->success($data, 'Tag created successfully');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag) {
        $data = TagFacade::updateTag($request, $tag);
        return $this->ApiResponseFormat->success($data, 'Tag updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag) {
        $data = TagFacade::deleteTag($tag);
        if(!$data){
            return $this->ApiResponseFormat->error('Tag not found', 404);
        }
        return $this->ApiResponseFormat->success(null, 'Tag deleted successfully');
    }
}
