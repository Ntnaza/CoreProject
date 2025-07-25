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
    Schema::create('ctas', function (Blueprint $table) {
        $table->id();
        $table->string('headline');
        $table->text('paragraph');
        $table->string('button_text');
        $table->string('button_url')->default('#');
        $table->string('background_image');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ctas');
    }
};
