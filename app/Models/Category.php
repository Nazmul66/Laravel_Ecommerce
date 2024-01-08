<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo(Category::class, "is_parent");
    }

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_parent',
        'status',
        'image',
    ];
}
