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
    Schema::table('products', function (Blueprint $table) {
        // Mengubah tipe kolom menjadi TEXT agar bisa memuat link sangat panjang
        $table->text('shopee_link')->change(); 
    });
}

public function down(): void
{
    Schema::table('products', function (Blueprint $table) {
        $table->string('shopee_link', 255)->change();
    });
}
};
