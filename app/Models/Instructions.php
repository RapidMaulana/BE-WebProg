<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructions extends Model
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

    // Relasi ke Recipe
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    // Scope untuk urutkan berdasarkan order
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    // Accessor untuk format display dengan nomor urut
    public function getFormattedStepAttribute()
    {
        return "Langkah {$this->order}: {$this->step}";
    }
}