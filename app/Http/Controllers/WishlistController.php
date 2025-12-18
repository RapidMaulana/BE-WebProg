<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Recipe;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    // Ambil semua wishlist user
    public function index(Request $request)
    {
        $user = $request->user();

        $wishlists = $user->wishlists()->with('recipe')->get();

        return response()->json([
            'success' => true,
            'data' => $wishlists,
            'count' => $wishlists->count()
        ], 200);
    }

    // Tambah resep ke wishlist
    public function store(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'recipe_id' => 'required|integer|exists:recipes,id',
        ]);

        // Cek apakah resep sudah ada di wishlist
        if ($user->hasWishlist($validated['recipe_id'])) {
            return response()->json([
                'success' => false,
                'message' => 'Resep sudah ada di wishlist',
            ], 422);
        }

        $wishlist = Wishlist::create([
            'user_id' => $user->id,
            'recipe_id' => $validated['recipe_id'],
        ]);

        $wishlist->load('recipe');

        return response()->json([
            'success' => true,
            'message' => 'Resep berhasil ditambahkan ke wishlist',
            'data' => $wishlist
        ], 201);
    }

    // Hapus resep dari wishlist
    public function destroy(Request $request, $recipeId)
    {
        $user = $request->user();

        $wishlist = Wishlist::where('user_id', $user->id)
            ->where('recipe_id', $recipeId)
            ->first();

        if (!$wishlist) {
            return response()->json([
                'success' => false,
                'message' => 'Wishlist tidak ditemukan',
            ], 404);
        }

        $wishlist->delete();

        return response()->json([
            'success' => true,
            'message' => 'Resep berhasil dihapus dari wishlist',
        ], 200);
    }

    // Cek apakah resep ada di wishlist
    public function check(Request $request, $recipeId)
    {
        $user = $request->user();

        $exists = $user->hasWishlist($recipeId);

        return response()->json([
            'success' => true,
            'data' => [
                'recipe_id' => $recipeId,
                'in_wishlist' => $exists,
            ]
        ], 200);
    }

    // Ambil semua resep di wishlist dengan relasi lengkap
    public function getWishlistRecipes(Request $request)
    {
        $user = $request->user();

        $recipes = $user->wishlistRecipes()->with(['ingredients', 'instructions'])->get();

        return response()->json([
            'success' => true,
            'data' => $recipes,
            'count' => $recipes->count()
        ], 200);
    }
}