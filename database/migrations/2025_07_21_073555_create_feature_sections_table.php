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
    Schema::create('feature_sections', function (Blueprint $table) {
        $table->id();
        $table->string('headline');
        $table->text('paragraph');
        $table->string('link_text')->default('Learn More');
        $table->string('link_url')->default('#');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_sections');
    }
};
