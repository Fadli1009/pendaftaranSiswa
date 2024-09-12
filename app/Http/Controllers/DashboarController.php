<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;

class DashboarController extends Controller
{
    public function index()
    {
        $peserta = Peserta::count();
        $pesertaLolos = Peserta::where('status', 1)->count();
        $pesertaTdkLolos = Peserta::where('status', 0)->count();
        $petugas = User::count();
        $jurusan = Jurusan::count();
        return view('admin.pages.dashboard.index', compact('peserta', 'pesertaLolos', 'pesertaTdkLolos', 'petugas', 'jurusan'));
    }
}
