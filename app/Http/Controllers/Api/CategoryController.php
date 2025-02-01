<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Category\StoreRequest;
use App\Http\Requests\Api\Category\UpdateRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index() {
        return CategoryResource::collection(Category::all())->resolve();
    }
    public function show (Category $category) {
        return CategoryResource::make($category)->resolve();
    }
    public function store(StoreRequest $request) {
        $data = $request->validated();
        Category::create($data);
    }
    public function update(UpdateRequest $request, Category $category){
        $data = $request->validated();
        $category->update($data);
    }
    public function destroy(Category $category){
        $category->delete();
        return response()->json([
            'message' => 'Удалено'
        ], Response::HTTP_OK);
    }
}
