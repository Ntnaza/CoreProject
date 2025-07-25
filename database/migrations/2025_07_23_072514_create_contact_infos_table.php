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
    Schema::create('contact_infos', function (Blueprint $table) {
        $table->id();
        $table->string('section_title')->default('Contact');
        $table->text('section_subtitle');
        $table->string('address');
        $table->string('phone');
        $table->string('email');
        $table->text('map_url');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_infos');
    }
};
