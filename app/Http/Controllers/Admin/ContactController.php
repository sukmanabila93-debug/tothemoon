<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebSetting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $settings = WebSetting::pluck('value', 'key')->toArray();
        return view('admin.contact.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            WebSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->back()->with('success', 'Informasi kontak berhasil diperbarui!');
    }
}