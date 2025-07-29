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
    Schema::create('testimonials', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('position'); // Jabatan atau status (e.g., "CEO of ABC Corp")
        $table->text('quote'); // Isi testimoninya
        $table->string('photo')->nullable(); // Foto pemberi testimoni (opsional)
        $table->integer('stars')->default(5); // Rating bintang (1-5)
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
