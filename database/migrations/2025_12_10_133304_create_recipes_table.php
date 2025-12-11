<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('prep_time'); // dalam menit
            $table->integer('cook_time'); // dalam menit
            $table->integer('total_time'); // dalam menit
            $table->integer('servings');
            $table->enum('difficulty', ['mudah', 'sedang', 'sulit']);
            $table->string('category');
            $table->string('image')->nullable();
            $table->float('rating')->default(0);
            $table->integer('reviews')->default(0);
            $table->timestamps();

            // Index untuk performa query
            $table->index('category');
            $table->index('difficulty');
            $table->index('rating');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};