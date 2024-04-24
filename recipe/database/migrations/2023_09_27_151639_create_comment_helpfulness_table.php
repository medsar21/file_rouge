<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comment_helpfulness', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comment_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('helpful')->default(false);
            $table->timestamps();

            // Define foreign keys
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Add a unique constraint to ensure a user can mark a comment as helpful only once
            $table->unique(['comment_id', 'user_id']);

            // You can also add an index for the 'helpful' column for efficient querying
            $table->index('helpful');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comment_helpfulness');
    }
};
