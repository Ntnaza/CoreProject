<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class TeamMember extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'position', 'photo', 'description',
        'twitter_url', 'facebook_url', 'instagram_url', 'linkedin_url'
    ];
}
