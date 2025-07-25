<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class PortfolioItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'image', 'portfolio_category_id', 'detail_url'
    ];

    // Mendefinisikan relasi: Satu item portfolio milik satu kategori
    public function category()
    {
        return $this->belongsTo(PortfolioCategory::class, 'portfolio_category_id');
    }
}