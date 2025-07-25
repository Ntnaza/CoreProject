<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_title', 'section_subtitle', 'headline', 'main_image',
        'paragraph1', 'paragraph2', 'italic_paragraph', 'list_items',
        'final_paragraph', 'video_image', 'video_url'
    ];
}