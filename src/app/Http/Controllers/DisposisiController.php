<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use App\Models\JenisSurat;
use App\Models\User;

class DisposisiController extends Controller
{
    public function index()
    {
        $suratm = SuratMasuk::where('status', 'Sudah disposisi')->get();
        $disposisi = SuratMasuk::where('status', 'Belum disposisi')->get();
        return view('disposisi.index', compact('suratm', 'disposisi'));
    }

    public function store(Request $request, $id)
    {
        SuratMasuk::where('id', $request->id)->update([
            'status' => 'Sudah disposisi',
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('disposisi.index');
    }
}
