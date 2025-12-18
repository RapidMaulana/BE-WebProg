<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'email',
        'password',
        'nomor_telepon',
        'alamat',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relasi ke Wishlist
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    // Cek apakah user sudah menambahkan resep ke wishlist
    public function hasWishlist($recipeId)
    {
        return $this->wishlists()
            ->where('recipe_id', $recipeId)
            ->exists();
    }

    // Ambil semua resep di wishlist user
    public function wishlistRecipes()
    {
        return $this->hasManyThrough(
            Recipe::class,
            Wishlist::class,
            'user_id',
            'id',
            'id',
            'recipe_id'
        );
    }
}