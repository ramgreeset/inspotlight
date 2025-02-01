<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Profile\StoreRequest;
use App\Http\Requests\Api\Profile\UpdateRequest;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use Illuminate\Http\Response;

class ProfileController extends Controller
{
    public function index() {
        return ProfileResource::collection(Profile::all());
    }
    public function show (Profile $category) {
        return ProfileResource::make($category)->resolve();
    }
    public function store(StoreRequest $request) {
        $data = $request->validated();
        Profile::create($data);
    }
    public function update(UpdateRequest $request, Profile $category){
        $data = $request->validated();
        $category->update($data);
    }
    public function destroy(Profile $category){
        $category->delete();
        return response()->json([
            'message' => 'Удалено'
        ], Response::HTTP_OK);
    }
}
