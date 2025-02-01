<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Comment\UpdateRequest;
use App\Http\Requests\Api\Comment\StoreRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    public function index() {
        return CommentResource::collection(Comment::all())->resolve();
    }
    public function show (Comment $category) {
        return CommentResource::make($category)->resolve();
    }
    public function store(StoreRequest $request) {
        $data = $request->validated();
        Comment::create($data);
    }
    public function update(UpdateRequest $request, Comment $category){
        $data = $request->validated();
        $category->update($data);
    }
    public function destroy(Comment $category){
        $category->delete();
        return response()->json([
            'message' => 'Удалено'
        ], Response::HTTP_OK);
    }
}
