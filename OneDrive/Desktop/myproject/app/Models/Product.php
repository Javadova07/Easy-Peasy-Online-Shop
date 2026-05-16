<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [

        'category',
        'name',
        'price',
        'description',
        'image',

        'ram',
        'storage',
        'processor',

        'size',
        'color',
        'material',

        'tone',
        'weight',
        'skin_type',

        'shoe_size'
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}