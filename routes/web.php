<?php
use \App\Http\Controllers\CategoryController;
use App\Services\EventValidateService;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return "Привет !";
});


Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/store', [CategoryController::class, 'store']);
