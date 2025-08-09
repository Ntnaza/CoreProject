<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str; // 1. Pastikan ini ada

class PortfolioItem extends Model
{
    use HasFactory;

    // 2. Tambahkan 'slug' ke dalam $fillable
    protected $fillable = [
        'title', 'slug', 'description', 'image', 'portfolio_category_id', 'detail_url'
    ];

    /**
     * 3. Tambahkan fungsi boot() ini untuk membuat slug otomatis.
     * Fungsi ini akan berjalan setiap kali item disimpan atau diperbarui.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $item->slug = Str::slug($item->title, '-');
        });

        static::updating(function ($item) {
            $item->slug = Str::slug($item->title, '-');
        });
    }

    // Mendefinisikan relasi: Satu item portfolio milik satu kategori
    public function category()
    {
        return $this->belongsTo(PortfolioCategory::class, 'portfolio_category_id');
    }
}