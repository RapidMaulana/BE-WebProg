<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::prefix('recipes')->group(function () {
    // CRUD dasar
    Route::get('/', [RecipeController::class, 'index']);              // Ambil semua resep
    Route::post('/', [RecipeController::class, 'store']);             // Buat resep baru
    Route::get('/{id}', [RecipeController::class, 'show']);           // Ambil detail resep
    Route::put('/{id}', [RecipeController::class, 'update']);         // Update resep
    Route::delete('/{id}', [RecipeController::class, 'destroy']);     // Hapus resep

    // Filter dan search
    Route::get('/category/{category}', [RecipeController::class, 'filterByCategory']);
    Route::get('/difficulty/{difficulty}', [RecipeController::class, 'filterByDifficulty']);
    Route::get('/search', [RecipeController::class, 'search']);
});