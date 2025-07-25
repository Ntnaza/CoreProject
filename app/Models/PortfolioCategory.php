<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// app/Models/PortfolioCategory.php
class PortfolioCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'filter'];
}