<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    // Relasi ke Recipe
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    // Scope untuk filter ingredient leftover
    public function scopeLeftover($query)
    {
        return $query->where('leftover', true);
    }

    // Scope untuk filter ingredient baru (tidak leftover)
    public function scopeFresh($query)
    {
        return $query->where('leftover', false);
    }

    // Accessor untuk format display
    public function getDisplayNameAttribute()
    {
        return "{$this->amount} {$this->unit} {$this->name}";
    }
}