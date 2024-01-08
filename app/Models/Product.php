<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'brand_id',
        'category_id',
        'short-details',
        'long-details',
        'regular-price',
        'offer-price',
        'quantity',
        'sku-code',
        'video-link',
        'is_featured',
        "status",
        "tags"
    ];
}
