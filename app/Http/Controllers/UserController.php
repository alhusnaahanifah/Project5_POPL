<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Talk;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mendapatkan semua pengguna yang bukan admin
        $users = User::where('usertype', '!=', 'admin')->get();

        return view('pages.users', compact('users'));
    }

    public function count()
    {
        // Mengambil jumlah user dari tabel users
        $totalUsers = User::where('usertype', '<>', 'admin')->count();

        // Mengambil jumlah talk dari tabel talks
        $totalTalks = Talk::count();

        // Kemudian kirimkan data tersebut ke view
        return view('pages.dashboard', compact('totalUsers', 'totalTalks'));
    }
    public function destroy($id)
    {
        // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Hapus pengguna
        $user->delete();

        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}