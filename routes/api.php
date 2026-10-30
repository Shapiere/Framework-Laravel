<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

// Login untuk memperoleh token (dipakai saat testing di Postman).
Route::post('/login', [AuthController::class, 'login']);

// Read All dan Show dapat diakses semua orang, termasuk yang belum autentikasi.
Route::apiResource('genres', GenreController::class)->only(['index', 'show']);
Route::apiResource('authors', AuthorController::class)->only(['index', 'show']);

// Create, Update, dan Destroy hanya untuk admin.
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::apiResource('genres', GenreController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('authors', AuthorController::class)->only(['store', 'update', 'destroy']);
});

Route::apiResource('books', BookController::class)->only(['index']);
