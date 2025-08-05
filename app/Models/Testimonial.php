<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    // ...

    protected $fillable = [
        'name',
        'position',
        'quote',
        'photo',
        'stars',
        'status', // <-- PASTIKAN BARIS INI ADA
    ];
}