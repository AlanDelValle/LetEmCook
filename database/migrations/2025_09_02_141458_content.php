<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement()->index();
            $table->string('title', 255);
            $table->string('description', 1000)->nullable();
            $table->unsignedInteger('view_count')->default(0);            
            $table->unsignedInteger('video_duration_seconds')->nullable();
            $table->string('video_thumbnail_url', 400);
            $table->string('video_embed_url', 400);        
            $table->json('video_thumbnail_previews_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
