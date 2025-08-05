<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // dalam file ..._create_testimonial_pages_table.php

public function up(): void
{
    Schema::create('testimonial_pages', function (Blueprint $table) {
        $table->id();
        $table->string('title')->nullable();
        $table->text('subtitle')->nullable();
        $table->string('background_image')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonial_pages');
    }
};
