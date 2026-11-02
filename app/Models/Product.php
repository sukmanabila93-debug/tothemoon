<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'name', 'slug', 'price', 
        'discount_price', 'sizes', 'description', 
        'details', 'shopee_link', 'main_image', 'status',
        'gallery_images' // <--- TAMBAHKAN INI
    ];

    protected $casts = [
        'sizes' => 'array',
        'details' => 'array',
        'gallery_images' => 'array', // <--- TAMBAHKAN INI
    ];

    // Setiap produk pasti memiliki satu kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}