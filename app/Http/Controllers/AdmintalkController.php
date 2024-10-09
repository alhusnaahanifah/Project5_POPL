<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Talk;

class AdmintalkController extends Controller
{
    public function index()
    {
        $talks = Talk::with('comments')->get();
        return view('pages.talkadmin', compact('talks'));
    }
    public function delete($id)
{
    $talk = Talk::findOrFail($id);

    // Pastikan admin memiliki wewenang untuk menghapus talk
    // Anda dapat menyesuaikan ini sesuai dengan kebutuhan aplikasi Anda
    // Misalnya, Anda dapat menggunakan middleware untuk mengecek apakah pengguna adalah admin
    // Atau Anda dapat menambahkan kolom role pada tabel users dan memeriksa peran pengguna
    // Di sini saya mengasumsikan bahwa pengguna dengan ID 1 adalah admin
    $adminUserId = 4;
    $isAdmin = Auth::id() == $adminUserId;

    // Cek apakah pengguna adalah admin
    if ($isAdmin) {
        $talk->delete();
        return redirect()->back()->with('success', 'Talk deleted successfully.');
    } else {
        return redirect()->back()->with('error', 'You are not authorized to delete this talk.');
    }
}
}