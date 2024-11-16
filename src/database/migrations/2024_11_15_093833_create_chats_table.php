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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->boolean('permit');
            $table->unsignedBigInteger('posting_id');
            $table->unsignedBigInteger('post_user_id');
            $table->unsignedBigInteger('listener_user_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('posting_id')->references('id')->on('postings')->onDelete('cascade');
            $table->foreign('post_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('listener_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
