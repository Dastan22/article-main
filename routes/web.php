<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;



Route::get('/', [ArticlesController::class, 'index']);

Route::get('/articles', [ArticlesController::class, 'catalog']);

Route::get('/articles/{id}', [ArticlesController::class, 'view']);
