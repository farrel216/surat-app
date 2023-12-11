<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKeluar;
use App\Models\JenisSurat;
use App\Models\User;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class SuratkController extends Controller
{
    public function index()
    {
        $suratk = SuratKeluar::all();

        return view('suratk.index', compact('suratk'));
    }

    public function create()
    {
        $jenissurat = JenisSurat::all();
        $user = User::all();
        return view('suratk.create', compact('jenissurat', 'user'));
    }

    public function store(Request $request)
    {
        $fileName = time().'.'.$request->file->extension();
        Storage::putFileAs('public/suratkeluar', $request->file('file'), $fileName);

        $suratkeluar = SuratKeluar::create([
            'no' => $request->no,
            'pengirim' => $request->pengirim,
            'perihal' => $request->perihal,
            'ditujukan' => $request->ditujukan,
            'tgl_surat' => $request->tgl_surat,
            'berkas' => $fileName,
            'jenis_id' => $request->jenis,
            'created_by' => $request->user,

        ]);

        return redirect()->route('suratk.index');
    }

    public function edit($id)
    {
        $suratk = SuratKeluar::find($id);
        $jenissurat = JenisSurat::all();;
        return view('suratk.edit', compact('suratk', 'jenissurat'));
    }

    public function update(Request $request, $id)
    {


        if ($request->hasFile('file')) {
            $file_lama = SuratKeluar::find($id)->file;

            Storage::delete('public/suratkeluar/'.$file_lama);

            $fileName = time().'.'.$request->file->extension();

            Storage::putFileAs('public/suratkeluar', $request->file('file'), $fileName);

            SuratKeluar::where('id', $id)->update([
                'no' => $request->no,
                'pengirim' => $request->pengirim,
                'perihal' => $request->perihal,
                'ditujukan' => $request->ditujukan,
                'tgl_surat' => $request->tgl_surat,
                'berkas' => $fileName,
                'jenis_id' => $request->jenis,
            ]);
        }else{
            SuratKeluar::where('id', $id)->update([
                'no' => $request->no,
                'pengirim' => $request->pengirim,
                'perihal' => $request->perihal,
                'ditujukan' => $request->ditujukan,
                'tgl_surat' => $request->tgl_surat,
                'jenis_id' => $request->jenis,
            ]);
        }
        return redirect()->route('suratk.index');
    }

    public function destroy($id)
    {

        $surat = SuratKeluar::find($id);
        Storage::delete('public/suratkeluar/'.$surat->file);

        SuratKeluar::where('id', $id)->delete();
        return redirect()->route('suratk.index');
    }

    public function download($filename)
    {
        $file = storage_path('app/public/suratkeluar/' . $filename);

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            return response()->json(['message' => 'File not found'], 404);
        }
    }

    public function show($id)
    {
        $suratk = SuratKeluar::where('id', $id)->with('jenis_surat', 'user')->first();

        return view('suratk.show', compact('suratk'));
    }
}
