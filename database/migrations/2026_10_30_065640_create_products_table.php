<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel categories
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            
            $table->string('name');
            $table->string('slug')->unique(); // Untuk URL produk
            $table->integer('price');
            $table->integer('discount_price')->nullable(); // Harga coret (boleh kosong)
            $table->json('sizes')->nullable(); // Simpan ukuran dalam bentuk array ["M", "L", "XL"]
            $table->text('description')->nullable();
            $table->json('details')->nullable(); // Simpan detail spesifikasi (Material, Fit, dll)
            $table->string('shopee_link'); // Link menuju Shopee
            $table->string('main_image'); // Nama file foto produk utama
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
