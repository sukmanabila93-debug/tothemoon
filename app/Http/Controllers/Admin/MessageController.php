<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $filter = $request->input('filter', 'semua'); // Default 'semua'

        $query = ContactMessage::latest();

        // Logika Pencarian Nama atau Pesan
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'ilike', "%{$search}%")
                  ->orWhere('message', 'ilike', "%{$search}%");
            });
        }

        // Logika Filter Status
        if ($filter == 'baru') {
            $query->where('is_read', false);
        } elseif ($filter == 'dibaca') {
            $query->where('is_read', true);
        }

        $messages = $query->paginate(10);

        return view('admin.messages.index', compact('messages', 'search', 'filter'));
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        
        // Tandai otomatis sebagai sudah dibaca saat diklik detailnya
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('admin.messages.show', compact('message'));
    }

    public function destroy($id)
    {
        ContactMessage::findOrFail($id)->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Pesan berhasil dihapus.');
    }
}