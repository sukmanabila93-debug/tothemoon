<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        // Ambil semua data dengan format Key-Value array
        $settings = WebSetting::pluck('value', 'key')->toArray();
        return view('admin.about.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', 'philosophy_image']);

        // Simpan gambar filosofi jika diunggah
        if ($request->hasFile('philosophy_image')) {
            $path = $request->file('philosophy_image')->store('settings', 'public');
            $data['about_image'] = $path;
        }

        // Simpan setiap inputan sebagai baris di database (key => value)
        foreach ($data as $key => $value) {
            // Karena values (brand values) berbentuk array, kita jadikan json
            if (is_array($value)) {
                $value = json_encode($value);
            }
            WebSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->back()->with('success', 'Halaman About Us berhasil diperbarui!');
    }
}