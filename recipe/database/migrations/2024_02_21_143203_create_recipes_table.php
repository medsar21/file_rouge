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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('name');
            $table->string('video_url')->nullable();
            $table->text('description');
            $table->integer('prep_time');
            $table->integer('cook_time');
            $table->integer('servings');
            $table->json('instructions');
            $table->json('ingredients');
            $table->json('tools');
            $table->json('tags');
            $table->string('image');
            $table->float('average_rating')->default(0.0);
            $table->integer('review_count')->default(0);
            $table->integer('view_count')->default(0);
            $table->integer('calories')->nullable();
            $table->integer('fat')->nullable();
            $table->integer('carbs')->nullable();
            $table->integer('protein')->nullable();
            $table->timestamps();
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