<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('content_category', function (Blueprint $table) {
            $table->unsignedBigInteger('content_id');
            $table->unsignedInteger('category_id');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            // Composite primary key
            $table->primary(['content_id', 'category_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('content_category');
    }
};
