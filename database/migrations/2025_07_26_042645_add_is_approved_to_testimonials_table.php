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
    Schema::table('testimonials', function (Blueprint $table) {
        // Menambahkan kolom boolean (true/false) dengan nilai default false (pending)
        $table->boolean('is_approved')->default(false)->after('stars');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            //
        });
    }
};
