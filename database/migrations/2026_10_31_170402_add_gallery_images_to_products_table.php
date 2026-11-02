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
        // Tambahkan kolom gallery_images jika belum ada
        if (!Schema::hasColumn('products', 'gallery_images')) {
            $table->json('gallery_images')->nullable();
        }
    });
}

public function down(): void
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn('gallery_images');
    });
}
};
