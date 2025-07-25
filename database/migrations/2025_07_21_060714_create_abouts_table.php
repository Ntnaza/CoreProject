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
        $table->string('section_title')->default('About Us');
        $table->text('section_subtitle');
        $table->string('headline');
        $table->string('main_image');
        $table->text('paragraph1');
        $table->text('paragraph2');
        $table->text('italic_paragraph');
        $table->text('list_items'); // Kita simpan list sebagai teks, dipisah baris baru
        $table->text('final_paragraph');
        $table->string('video_image');
        $table->string('video_url');
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
