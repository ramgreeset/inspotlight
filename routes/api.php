<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RatingController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('categories', CategoryController::class);
Route::apiResource('tags', CommentController::class);
Route::apiResource('comments', EventController::class);
Route::apiResource('events', ProfileController::class);
Route::apiResource('profiles', RatingController::class);
Route::apiResource('ratings', RoleController::class);
Route::apiResource('roles', TagController::class);



