<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'main_image',
        'gallery',
        'manufacturer_name',
        'manufacturer_brand',
        'stock',
        'price',
        'discount',
        'orders',
    ];

    protected $casts = [
        'gallery' => 'array',
    ];



}
