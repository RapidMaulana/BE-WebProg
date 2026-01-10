<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;


    // Routes tanpa authentication (Public)
    Route::post('/auth/register', [AuthController::class, 'register']);
    Route::post('/auth/login', [AuthController::class, 'login']);
    
    // Routes dengan authentication (Protected)
    Route::middleware('auth:sanctum')->group(function () {
        // Auth routes
        Route::get('/auth/profile', [AuthController::class, 'profile']);
        Route::put('/auth/profile', [AuthController::class, 'updateProfile']);
        Route::put('/auth/password', [AuthController::class, 'updatePassword']);
        Route::post('/auth/logout', [AuthController::class, 'logout']);
    
        // Wishlist routes (spesifik dulu, baru parameter)
        Route::get('/wishlists', [WishlistController::class, 'index']);
        Route::post('/wishlists', [WishlistController::class, 'store']);
        Route::get('/wishlists/recipes', [WishlistController::class, 'getWishlistRecipes']);
        Route::get('/wishlists/check/{recipeId}', [WishlistController::class, 'check']);
        Route::delete('/wishlists/{recipeId}', [WishlistController::class, 'destroy']);
    });
    
    // Recipe routes (Public)
    Route::get('/recipes', [RecipeController::class, 'index']);
    Route::post('/recipes', [RecipeController::class, 'store']);
    Route::get('/recipes/{id}', [RecipeController::class, 'show']);
    Route::put('/recipes/{id}', [RecipeController::class, 'update']);
    Route::delete('/recipes/{id}', [RecipeController::class, 'destroy']);
    Route::get('/recipes/category/{category}', [RecipeController::class, 'filterByCategory']);
    Route::get('/recipes/difficulty/{difficulty}', [RecipeController::class, 'filterByDifficulty']);
    Route::get('/recipes/search', [RecipeController::class, 'search']);
