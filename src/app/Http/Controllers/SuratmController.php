<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use App\Models\JenisSurat;
use App\Models\User;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class SuratmController extends Controller
{
    public function index()
    {
        $suratm = SuratMasuk::all();

        return view('suratm.index', compact('suratm'));
    }

    public function create()
    {
        $jenissurat = JenisSurat::all();
        $user = User::all();
        return view('suratm.create', compact('jenissurat', 'user'));
    }

    public function store(Request $request)
    {
        $fileName = time().'.'.$request->file->extension();
        Storage::putFileAs('public/suratmasuk', $request->file('file'), $fileName);

        $suratmasuk = SuratMasuk::create([
            'no' => $request->no,
            'pengirim' => $request->pengirim,
            'perihal' => $request->perihal,
            'ditujukan' => $request->ditujukan,
            'tgl_surat' => $request->tgl_surat,
            'berkas' => $fileName,
            'jenis_id' => $request->jenis,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
            'created_by' => $request->user,
        ]);

        return redirect()->route('suratm.index');
    }

    public function edit($id)
    {
        $suratm = SuratMasuk::find($id);
        $jenissurat = JenisSurat::all();;
        return view('suratm.edit', compact('suratm', 'jenissurat'));
    }

    public function update(Request $request, $id)
    {


        if ($request->hasFile('file')) {
            $file_lama = SuratMasuk::find($id)->file;

            Storage::delete('public/suratmasuk/'.$file_lama);

            $fileName = time().'.'.$request->file->extension();

            Storage::putFileAs('public/suratmasuk', $request->file('file'), $fileName);

            SuratMasuk::where('id', $id)->update([
                'no' => $request->no,
                'pengirim' => $request->pengirim,
                'perihal' => $request->perihal,
                'ditujukan' => $request->ditujukan,
                'tgl_surat' => $request->tgl_surat,
                'berkas' => $fileName,
                'jenis_id' => $request->jenis,
                'status' => $request->status,
                'deskripsi' => $request->deskripsi,
            ]);
        }else{
            SuratMasuk::where('id', $id)->update([
                'no' => $request->no,
                'pengirim' => $request->pengirim,
                'perihal' => $request->perihal,
                'ditujukan' => $request->ditujukan,
                'tgl_surat' => $request->tgl_surat,
                'jenis_id' => $request->jenis,
                'status' => $request->status,
                'deskripsi' => $request->deskripsi,
            ]);
        }
        return redirect()->route('suratm.index');
    }

    public function destroy($id)
    {

        $surat = SuratMasuk::find($id);
        Storage::delete('public/suratmasuk/'.$surat->file);

        SuratMasuk::where('id', $id)->delete();
        return redirect()->route('suratm.index');
    }

    public function download($filename)
    {
        $file = storage_path('app/public/suratmasuk/' . $filename);

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            return response()->json(['message' => 'File not found'], 404);
        }
    }

    public function show($id)
    {
        $suratm = SuratMasuk::where('id', $id)->with('jenis_surat', 'user')->first();

        return view('suratm.show', compact('suratm'));
    }

    public function disposisi(Request $request, $id)
    {
        SuratMasuk::where('id', $request->id)->update([
            'status' => 'Sudah disposisi',
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('suratm.index');
    }

}
