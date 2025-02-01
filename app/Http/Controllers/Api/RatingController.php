<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Rating\StoreRequest;
use App\Http\Requests\Api\Rating\UpdateRequest;
use App\Http\Resources\Rating\RatingResource;
use App\Models\Rating;
use Illuminate\Http\Response;

class RatingController extends Controller
{
    public function index() {
        return RatingResource::collection(Rating::all());
    }
    public function show (Rating $category) {
        return RatingResource::make($category)->resolve();
    }
    public function store(StoreRequest $request) {
        $data = $request->validated();
        Rating::create($data);
    }
    public function update(UpdateRequest $request, Rating $category){
        $data = $request->validated();
        $category->update($data);
    }
    public function destroy(Rating $category){
        $category->delete();
        return response()->json([
            'message' => 'Удалено'
        ], Response::HTTP_OK);
    }
}
