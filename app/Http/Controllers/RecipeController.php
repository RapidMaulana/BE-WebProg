<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Instruction;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    // Ambil semua resep
    public function index()
    {
        $recipes = Recipe::with(['ingredients', 'instructions'])
            ->orderBy('rating', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $recipes,
            'count' => $recipes->count()
        ], 200);
    }

    // Ambil detail resep berdasarkan ID
    public function show($id)
    {
        $recipe = Recipe::with(['ingredients', 'instructions'])
            ->find($id);

        if (!$recipe) {
            return response()->json([
                'success' => false,
                'message' => 'Resep tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $recipe
        ], 200);
    }

    // Buat resep baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'prep_time' => 'required|integer|min:0',
            'cook_time' => 'required|integer|min:0',
            'servings' => 'required|integer|min:1',
            'difficulty' => 'required|string|in:mudah,sedang,sulit',
            'category' => 'required|string',
            'image' => 'nullable|url',
            'rating' => 'nullable|numeric|min:0|max:5',
            'reviews' => 'nullable|integer|min:0',
            'ingredients' => 'required|array|min:1',
            'ingredients.*.name' => 'required|string',
            'ingredients.*.amount' => 'required|numeric|min:0',
            'ingredients.*.unit' => 'required|string',
            'ingredients.*.leftover' => 'required|boolean',
            'instructions' => 'required|array|min:1',
            'instructions.*' => 'required|string'
        ]);

        // Buat recipe
        $recipe = Recipe::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'prep_time' => $validated['prep_time'],
            'cook_time' => $validated['cook_time'],
            'total_time' => $validated['prep_time'] + $validated['cook_time'],
            'servings' => $validated['servings'],
            'difficulty' => $validated['difficulty'],
            'category' => $validated['category'],
            'image' => $validated['image'],
            'rating' => $validated['rating'] ?? 0,
            'reviews' => $validated['reviews'] ?? 0
        ]);

        // Buat ingredients
        foreach ($validated['ingredients'] as $index => $ingredient) {
            Ingredient::create([
                'recipe_id' => $recipe->id,
                'name' => $ingredient['name'],
                'amount' => $ingredient['amount'],
                'unit' => $ingredient['unit'],
                'leftover' => $ingredient['leftover']
            ]);
        }

        // Buat instructions
        foreach ($validated['instructions'] as $index => $instruction) {
            Instruction::create([
                'recipe_id' => $recipe->id,
                'step' => $instruction,
                'order' => $index + 1
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Resep berhasil dibuat',
            'data' => Recipe::with(['ingredients', 'instructions'])->find($recipe->id)
        ], 201);
    }

    // Update resep
    public function update(Request $request, $id)
    {
        $recipe = Recipe::find($id);

        if (!$recipe) {
            return response()->json([
                'success' => false,
                'message' => 'Resep tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'prep_time' => 'sometimes|integer|min:0',
            'cook_time' => 'sometimes|integer|min:0',
            'servings' => 'sometimes|integer|min:1',
            'difficulty' => 'sometimes|string|in:mudah,sedang,sulit',
            'category' => 'sometimes|string',
            'image' => 'sometimes|nullable|url',
            'rating' => 'sometimes|numeric|min:0|max:5',
            'reviews' => 'sometimes|integer|min:0',
            'ingredients' => 'sometimes|array',
            'ingredients.*.name' => 'required_with:ingredients|string',
            'ingredients.*.amount' => 'required_with:ingredients|numeric|min:0',
            'ingredients.*.unit' => 'required_with:ingredients|string',
            'ingredients.*.leftover' => 'required_with:ingredients|boolean',
            'instructions' => 'sometimes|array',
            'instructions.*' => 'required_with:instructions|string'
        ]);

        // Update recipe fields
        $recipe->update([
            'title' => $validated['title'] ?? $recipe->title,
            'description' => $validated['description'] ?? $recipe->description,
            'prep_time' => $validated['prep_time'] ?? $recipe->prep_time,
            'cook_time' => $validated['cook_time'] ?? $recipe->cook_time,
            'servings' => $validated['servings'] ?? $recipe->servings,
            'difficulty' => $validated['difficulty'] ?? $recipe->difficulty,
            'category' => $validated['category'] ?? $recipe->category,
            'image' => $validated['image'] ?? $recipe->image,
            'rating' => $validated['rating'] ?? $recipe->rating,
            'reviews' => $validated['reviews'] ?? $recipe->reviews
        ]);

        // Update total_time jika prep_time atau cook_time diubah
        if (isset($validated['prep_time']) || isset($validated['cook_time'])) {
            $recipe->update([
                'total_time' => ($validated['prep_time'] ?? $recipe->prep_time) + 
                               ($validated['cook_time'] ?? $recipe->cook_time)
            ]);
        }

        // Update ingredients jika ada
        if (isset($validated['ingredients'])) {
            $recipe->ingredients()->delete();
            foreach ($validated['ingredients'] as $ingredient) {
                Ingredient::create([
                    'recipe_id' => $recipe->id,
                    'name' => $ingredient['name'],
                    'amount' => $ingredient['amount'],
                    'unit' => $ingredient['unit'],
                    'leftover' => $ingredient['leftover']
                ]);
            }
        }

        // Update instructions jika ada
        if (isset($validated['instructions'])) {
            $recipe->instructions()->delete();
            foreach ($validated['instructions'] as $index => $instruction) {
                Instruction::create([
                    'recipe_id' => $recipe->id,
                    'step' => $instruction,
                    'order' => $index + 1
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Resep berhasil diperbarui',
            'data' => Recipe::with(['ingredients', 'instructions'])->find($recipe->id)
        ], 200);
    }

    // Hapus resep
    public function destroy($id)
    {
        $recipe = Recipe::find($id);

        if (!$recipe) {
            return response()->json([
                'success' => false,
                'message' => 'Resep tidak ditemukan'
            ], 404);
        }

        $recipe->ingredients()->delete();
        $recipe->instructions()->delete();
        $recipe->delete();

        return response()->json([
            'success' => true,
            'message' => 'Resep berhasil dihapus'
        ], 200);
    }

    // Filter resep berdasarkan kategori
    public function filterByCategory($category)
    {
        $recipes = Recipe::with(['ingredients', 'instructions'])
            ->where('category', $category)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $recipes,
            'count' => $recipes->count()
        ], 200);
    }

    // Filter resep berdasarkan tingkat kesulitan
    public function filterByDifficulty($difficulty)
    {
        $recipes = Recipe::with(['ingredients', 'instructions'])
            ->where('difficulty', $difficulty)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $recipes,
            'count' => $recipes->count()
        ], 200);
    }

    // Cari resep
    public function search(Request $request)
    {
        $query = $request->input('q');

        $recipes = Recipe::with(['ingredients', 'instructions'])
            ->where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get();

        return response()->json([
            'success' => true,
            'data' => $recipes,
            'count' => $recipes->count()
        ], 200);
    }
}