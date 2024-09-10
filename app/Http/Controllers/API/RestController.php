<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class RestController extends Controller
{
    public function jurusan()
    {
        $jurusan = Jurusan::all();
        return response()->json(['data' => $jurusan, 'status' => 'success'], 200);
    }
}
