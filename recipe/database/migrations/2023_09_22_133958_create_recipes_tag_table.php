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
        Schema::create('recipes_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recipes_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('recipes_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes_tag');
    }
};
