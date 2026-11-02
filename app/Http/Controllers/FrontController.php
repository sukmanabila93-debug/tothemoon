<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class FrontController extends Controller
{
    public function index() {
        // Ambil 4 produk aktif terbaru untuk halaman Home
        $featuredProducts = Product::where('status', 'aktif')->latest()->take(4)->get();
        return view('front.home', compact('featuredProducts'));
    }

    public function shop(Request $request) {
        $selectedCategory = $request->query('category', 'all');

        $query = Product::where('status', 'aktif');

        if ($selectedCategory !== 'all') {
            $query->whereHas('category', function($q) use ($selectedCategory) {
                $q->where('slug', $selectedCategory);
            });
        }

        $products = $query->latest()->paginate(8);
        $categories = Category::all();

        return view('front.shop', compact('products', 'selectedCategory', 'categories'));
    }

    public function showProduct($slug) {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('front.product-detail', compact('product'));
    }

    public function about() {

        // Ambil semua pengaturan dari database dan ubah jadi format ['key' => 'value']
        $settings = \App\Models\WebSetting::pluck('value', 'key')->toArray();
        return view('front.about', compact('settings'));
    }

    public function contact() {
        $settings = \App\Models\WebSetting::pluck('value', 'key')->toArray();
        return view('front.contact', compact('settings'));
    }

    public function sendContact(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        \App\Models\ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'is_read' => false
        ]);

        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim! Tim kami akan segera merespons.');
    }
}