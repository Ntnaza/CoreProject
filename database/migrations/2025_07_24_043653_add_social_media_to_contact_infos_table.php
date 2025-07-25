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
    Schema::table('contact_infos', function (Blueprint $table) {
        $table->string('twitter_url')->nullable()->after('map_url');
        $table->string('facebook_url')->nullable()->after('twitter_url');
        $table->string('instagram_url')->nullable()->after('facebook_url');
        $table->string('linkedin_url')->nullable()->after('instagram_url');
        $table->string('youtube_url')->nullable()->after('linkedin_url');
        $table->string('Tiktok_url')->nullable()->after('youtube_url');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_infos', function (Blueprint $table) {
            //
        });
    }
};
