<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Tag\StoreRequest;
use App\Http\Requests\Api\Tag\UpdateRequest;
use App\Http\Resources\Tag\TagResource;
use App\Models\Tag;
use Illuminate\Http\Response;

class TagController extends Controller
{
    public function index(){
        return TagResource::collection(Tag::all()->resolve());
    }
    public function show(Tag $tag){
        return Tag::make($tag)->resolve();
    }
    public function store(StoreRequest $request){
        $data = $request->validated();
        Tag::create($data);
    }
    public function update(UpdateRequest $request, Tag $tag){
        $data = $request->validated();
        $tag->update($data);
    }
    public function destroy(Tag $tag){
        $tag->delete();
        return response()->json([
            'message' => 'Удалено'
        ],Response::HTTP_OK);
    }
}
