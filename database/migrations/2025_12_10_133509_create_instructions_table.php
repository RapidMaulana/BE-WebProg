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
        Schema::create('instructions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_id')
                ->constrained('recipes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->text('step');
            $table->integer('order');
            $table->timestamps();

            // Index untuk performa query
            $table->index('recipe_id');
            $table->index('order');

            // Unique constraint untuk mencegah duplikasi order per recipe
            $table->unique(['recipe_id', 'order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructions');
    }
};