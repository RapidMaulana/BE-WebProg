<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'prep_time',
        'cook_time',
        'total_time',
        'servings',
        'difficulty',
        'category',
        'image',
        'rating',
        'reviews'
    ];

    protected $casts = [
        'prep_time' => 'integer',
        'cook_time' => 'integer',
        'total_time' => 'integer',
        'servings' => 'integer',
        'rating' => 'float',
        'reviews' => 'integer'
    ];

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function instructions()
    {
        return $this->hasMany(Instruction::class);
    }
}

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'name',
        'amount',
        'unit',
        'leftover'
    ];

    protected $casts = [
        'amount' => 'float',
        'leftover' => 'boolean'
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}

class Instruction extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'step',
        'order'
    ];

    protected $casts = [
        'order' => 'integer'
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}