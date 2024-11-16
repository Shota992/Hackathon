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
        Schema::table('users', function (Blueprint $table) {
            $table->string('target')->nullable()->default(null)->change(); // targetをnullableに
            $table->float('generation')->nullable()->default(null)->change(); // generationをnullableに
            $table->string('icon_image')->nullable()->default(null)->change(); // icon_imageをnullableに
            $table->string('role')->default('user')->change(); // roleのデフォルト値を'user'に
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('target')->default('')->change(); // nullable解除
            $table->float('generation')->default(0)->change(); // nullable解除
            $table->string('icon_image')->default('')->change(); // nullable解除
            $table->string('role')->default(null)->change(); // デフォルト値解除
        });
    }
};
