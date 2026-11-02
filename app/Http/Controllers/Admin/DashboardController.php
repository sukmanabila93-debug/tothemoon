<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung data real dari database
        $totalProducts = Product::count();
        $activeProducts = Product::where('status', 'aktif')->count();
        $inactiveProducts = Product::where('status', 'nonaktif')->count();
        $totalCategories = Category::count();

        // Mengambil 4 produk terbaru dari database
        $latestProducts = Product::latest()->take(4)->get();

        // Menghitung jumlah produk per kategori untuk bagian Kategori Produk
        $categories = Category::withCount('products')->get();

        return view('dashboard', compact(
            'totalProducts', 
            'activeProducts', 
            'inactiveProducts', 
            'totalCategories', 
            'latestProducts',
            'categories'
        ));
    }
}