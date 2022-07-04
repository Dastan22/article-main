<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/like', [ArticlesController::class, 'likeUp']);
Route::post('/show', [ArticlesController::class, 'showUp']);
Route::post('/comment', [ArticlesController::class, 'commentUp']);
