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
        'subCategory_id',
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

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function subCategory()
    // {
    //     return $this->belongsTo(SubCategory::class);
    // }
}
