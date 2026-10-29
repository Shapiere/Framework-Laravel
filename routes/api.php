<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

Route::apiResource('genres', GenreController::class);
Route::apiResource('authors', AuthorController::class);

Route::get('/books', [BookController::class, 'index']);
