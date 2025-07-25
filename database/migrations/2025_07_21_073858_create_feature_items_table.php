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
    Schema::create('feature_items', function (Blueprint $table) {
        $table->id();
        $table->string('icon'); // e.g., 'bi bi-clipboard-data'
        $table->string('title');
        $table->text('description');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_items');
    }
};
