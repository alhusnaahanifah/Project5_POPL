<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;

class KomentarController extends Controller
{
    public function show($id)
    {
        $komentar = Komentar::findOrFail($id);

        return response()->json(['komentar' => $komentar], 200);
    }

    public function store(Request $request, $talkId, $userId) // Ubah parameter
    {
        $request->validate([
            'komentar' => 'required|string',
        ]);

        $komentar = new Komentar();
        $komentar->talk_id = $talkId; // Ubah cara mendapatkan talk_id
        $komentar->user_id = $userId; // Ubah cara mendapatkan user_id
        $komentar->komentar = $request->input('komentar');
        $komentar->save();

        return response()->json(['message' => 'Komentar berhasil disimpan'], 201);
    }
}
