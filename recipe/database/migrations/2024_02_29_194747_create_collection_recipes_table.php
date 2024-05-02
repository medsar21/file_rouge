<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('collection_recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collection_id'); // Use 'constrained' for foreign keys
            $table->foreignId('recipes_id'); // Use 'constrained' for foreign keys
            $table->timestamps();

            $table->foreign('collection_id')->references('id')->on('collection')->onDelete('cascade');
            $table->foreign('recipes_id')->references('id')->on('recipes')->onDelete('cascade');

            $table->unique(['collection_id', 'recipes_id']); // Unique constraint for combination
        });
    }

    public function down()
    {
        Schema::dropIfExists('collection_recipes');
    }
};
