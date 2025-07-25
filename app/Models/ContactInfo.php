<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactInfo extends Model
{
    use HasFactory;
    protected $fillable = ['section_title', 'section_subtitle', 'address', 'phone', 'email', 'map_url', 'twitter_url', 'facebook_url', 'instagram_url', 'linkedin_url', 'youtube_url', 'tiktok_url'];
}
