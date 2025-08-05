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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('section_title');
            $table->text('section_subtitle');
            $table->text('italic_paragraph');
            $table->text('list_items');
            $table->string('video_image')->nullable(); // Dibuat nullable
            $table->string('video_url')->nullable();   // Dibuat nullable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};