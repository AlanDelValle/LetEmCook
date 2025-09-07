<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cook_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('cook_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cook_id')->references('id')->on('cooks')->onDelete('cascade');

            $table->unique(['user_id', 'cook_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cook_user');
    }
};