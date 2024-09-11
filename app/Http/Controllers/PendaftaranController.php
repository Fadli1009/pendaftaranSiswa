<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function  index()
    {
        $jurusan = Jurusan::all();
        $gelombang = Gelombang::where('aktig', 1)->first();
        return view('form.index', compact('jurusan', 'gelombang'));
    }
    public function thanks()
    {
        return view('thanks');
    }
}
