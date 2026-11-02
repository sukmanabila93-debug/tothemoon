<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $category_id = $request->input('category_id'); 
        
        $products = Product::with('category')
            ->when($search, function($query, $search) {
                return $query->where(function($q) use ($search) {
                    $q->where('name', 'ilike', "%{$search}%")
                      ->orWhereHas('category', function($qCat) use ($search) {
                          $qCat->where('name', 'ilike', "%{$search}%");
                      });
                });
            })
            ->when($category_id, function($query, $category_id) {
                return $query->where('category_id', $category_id);
            })
            ->latest()
            ->get(); // <-- Diubah dari paginate(10) menjadi get() agar tampil semua tanpa pagination bawah
            
        $categories = Category::all();
            
        return view('admin.products.index', compact('products', 'search', 'category_id', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // 1. Bersihkan tanda titik/koma dari harga terlebih dahulu
        $request->merge([
            'price' => str_replace(['.', ','], '', $request->price)
        ]);

        // 2. Baru lakukan validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'sizes' => 'required|array',
            'description' => 'required|string',
            'shopee_link' => 'required|url',
            'status' => 'required|in:aktif,nonaktif',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'details' => 'nullable|array', // TAMBAHKAN BARIS INI
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name) . '-' . Str::random(5);
        
        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('products', 'public');
        }

        // Proses Foto Tambahan (Thumbnail)
        $gallery = [];
        if ($request->hasFile('image_2')) {
            $gallery['image_2'] = $request->file('image_2')->store('products/gallery', 'public');
        }
        if ($request->hasFile('image_3')) {
            $gallery['image_3'] = $request->file('image_3')->store('products/gallery', 'public');
        }
        $data['gallery_images'] = $gallery;

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        // 1. Bersihkan tanda titik/koma dari harga terlebih dahulu
        $request->merge([
            'price' => str_replace(['.', ','], '', $request->price)
        ]);

        // 2. Baru lakukan validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'sizes' => 'required|array',
            'description' => 'required|string',
            'shopee_link' => 'required|url',
            'status' => 'required|in:aktif,nonaktif',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name) . '-' . Str::random(5);

        if ($request->hasFile('main_image')) {
            if ($product->main_image) {
                Storage::disk('public')->delete($product->main_image);
            }
            $data['main_image'] = $request->file('main_image')->store('products', 'public');
        }

        // Proses Update Foto Tambahan (Thumbnail)
        $gallery = $product->gallery_images ?? [];
        if ($request->hasFile('image_2')) {
            if (isset($gallery['image_2'])) Storage::disk('public')->delete($gallery['image_2']);
            $gallery['image_2'] = $request->file('image_2')->store('products/gallery', 'public');
        }
        if ($request->hasFile('image_3')) {
            if (isset($gallery['image_3'])) Storage::disk('public')->delete($gallery['image_3']);
            $gallery['image_3'] = $request->file('image_3')->store('products/gallery', 'public');
        }
        $data['gallery_images'] = $gallery;

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        // Hapus gambar fisik dari storage
        if ($product->main_image) {
            Storage::disk('public')->delete($product->main_image);
        }
        
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }
}