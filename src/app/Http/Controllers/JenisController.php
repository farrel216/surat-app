<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSurat;

class JenisController extends Controller
{
    public function index()
    {
        $jenis = JenisSurat::all();

        return view('jenissurat.index', compact('jenis'));
    }

    public function store(Request $request)
    {

        $jenis = JenisSurat::create([
            'name' => $request->name
        ]);

        return redirect()->route('jenis.index');
    }
}
