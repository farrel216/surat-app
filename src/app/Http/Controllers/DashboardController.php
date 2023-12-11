<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $suratmcount = SuratMasuk::all()->count();
        $suratkcount = SuratKeluar::all()->count();
        $disposisicount = SuratMasuk::where('status', 'Sudah disposisi')->count();
        $usercount = User::all()->count();

        return view('index', compact('suratmcount', 'suratkcount', 'disposisicount', 'usercount'));
    }
}
