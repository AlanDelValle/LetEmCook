<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cooks', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name', 100)->index();            
            $table->string('bio', 1000)->nullable();
            $table->string('cook_thumbnail_url', 400);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
       Schema::dropIfExists('cooks');
    }
};
