<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan kategori ada
        $tshirt = Category::firstOrCreate(['slug' => 't-shirt'], ['name' => 'T-Shirt']);
        $hoodie = Category::firstOrCreate(['slug' => 'hoodie'], ['name' => 'Hoodie']);
        $pants = Category::firstOrCreate(['slug' => 'pants'], ['name' => 'Pants']);

        $products = [
            [
                'category_id' => $tshirt->id,
                'name' => 'T-Shirt Boxy Pretty Girl Dark Grey',
                'price' => 220578,
                'discount_price' => 299000,
                'sizes' => ['M', 'L', 'XL'],
                'description' => 'T-Shirt bermaterial 100% Cotton Combed 16s Heavyweight tebal dan tidak menerawang. Hadir dengan potongan Boxy Cut modern.',
                'details' => ['bahan' => 'Katun', 'motif' => 'Sablon', 'material' => '100% Heavyweight Cotton Combed 16s', 'cutting' => 'Oversize Semi Boxy'],
                'shopee_link' => 'https://shopee.co.id',
                'main_image' => 'images/TshirtK.jpeg',
                'status' => 'aktif'
            ],
            [
                'category_id' => $tshirt->id,
                'name' => 'T-Shirt Oversized Love Again Black',
                'price' => 235000,
                'discount_price' => null,
                'sizes' => ['M', 'L', 'XL'],
                'description' => 'T-Shirt oversized dengan desain grafis eksklusif Tothemoon. Nyaman digunakan sehari-hari.',
                'details' => ['bahan' => 'Katun', 'motif' => 'Sablon Plastisol', 'material' => '100% Cotton Combed 24s', 'cutting' => 'Oversized'],
                'shopee_link' => 'https://shopee.co.id',
                'main_image' => 'images/ILY.jpeg',
                'status' => 'aktif'
            ],
            [
                'category_id' => $hoodie->id,
                'name' => 'Hoodie Boxy 330GSM Forever Black',
                'price' => 471000,
                'discount_price' => null,
                'sizes' => ['M', 'L', 'XL', 'XXL'],
                'description' => 'Hoodie heavyweight 330GSM dengan bahan fleece tebal berkualitas tinggi yang menghangatkan.',
                'details' => ['bahan' => 'Fleece Cotton', 'motif' => 'Bordir', 'material' => 'Cotton Fleece 330GSM', 'cutting' => 'Boxy Fit'],
                'shopee_link' => 'https://shopee.co.id',
                'main_image' => 'images/graybintang.jpeg',
                'status' => 'aktif'
            ],
            [
                'category_id' => $pants->id,
                'name' => 'Sweatpants Baggy Threestar Hitam',
                'price' => 340000,
                'discount_price' => null,
                'sizes' => ['S', 'M', 'L', 'XL'],
                'description' => 'Celana baggy kasual dengan bordir ikonik bintang Tothemoon di bagian samping.',
                'details' => ['bahan' => 'Baby Terry', 'motif' => 'Bordir', 'material' => 'Cotton Baby Terry Premium', 'cutting' => 'Baggy Fit'],
                'shopee_link' => 'https://shopee.co.id',
                'main_image' => 'images/its1.jpeg',
                'status' => 'aktif'
            ],
        ];

        foreach ($products as $prod) {
            $prod['slug'] = Str::slug($prod['name']) . '-' . Str::random(5);
            Product::create($prod);
        }
    }
}