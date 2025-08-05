<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class About extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // Kolom yang masih digunakan
        'section_title',
        'section_subtitle',
        'italic_paragraph',
        'list_items',
        'video_image',
        'video_url'
    ];
}