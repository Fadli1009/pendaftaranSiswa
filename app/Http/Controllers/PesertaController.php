<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jurusan;
use App\Models\Peserta;
use App\Models\Gelombang;
use App\Models\UserJurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $userLevel = Auth::user()->id_level;
        $jurusan = Jurusan::all();
        $gelombang = Gelombang::all();

        if ($userLevel === 2) {
            $userJurusanIds = UserJurusan::where('id_user', $userId)->pluck('id_jurusan');
            $pesertas = Peserta::whereIn('id_jurusan', $userJurusanIds);
            $peserta = $pesertas->where('status', 1)->get();
            // dd($peserta);
        } else {
            $peserta = Peserta::all();
        }

        return view('admin.pages.peserta.index', compact('peserta', 'jurusan', 'gelombang'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $insert = Peserta::create([
            'id_jurusan' => $request->id_jurusan,
            'id_gelombang' => $request->id_gelombang,
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'kartu_keluarga' => $request->kartu_keluarga,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'nama_sekolah' => $request->nama_sekolah,
            'kejuruan' => $request->kejuruan,
            'nomorHp' => $request->nomorHp,
            'email' => $request->email,
            'aktivasi_saat_ini' => $request->aktivasi_saat_ini
        ]);
        if (!$insert) {
            return redirect()->back()->with('error', 'Gagal menambahkan data');
        }
        return redirect()->route('thanks')->with('success', 'Data berhasil ditambahkan, pantau Instagram PPKD Jakarta Pusat');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $peserta = Peserta::find($id);
        return view('admin.pages.peserta.detail', compact('peserta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peserta $peserta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peserta $peserta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peserta $peserta)
    {
        //
    }

    public function cariPeserta(Request $request)
    {
        // dd($request->all());
        $jurusanId = $request->input('jurusan_id');
        $gelombangId = $request->input('gelombang_id');

        // Query untuk memfilter peserta
        $query = Peserta::query();

        if ($jurusanId) {
            $query->where('id_jurusan', $jurusanId);
        }

        if ($gelombangId) {
            $query->where('id_gelombang', $gelombangId);
        }

        $peserta = $query->get();

        // Mengambil data jurusan dan gelombang untuk ditampilkan di form
        $jurusan = Jurusan::all(); // Asumsikan model Jurusan ada
        $gelombang = Gelombang::all(); // Asumsikan model Gelombang ada
        return view('admin.pages.peserta.filterpeserta', compact('peserta', 'jurusan', 'gelombang'));
    }
    public function printPDF(Request $request)
    {
        $jurusanId = $request->input('jurusan_id');
        $gelombangId = $request->input('gelombang_id');

        // Query untuk memfilter peserta
        $query = Peserta::query();

        if ($jurusanId) {
            $query->where('id_jurusan', $jurusanId);
        }

        if ($gelombangId) {
            $query->where('id_gelombang', $gelombangId);
        }

        $peserta = $query->get();

        // Mengambil data jurusan dan gelombang untuk ditampilkan di form
        $jurusan = Jurusan::all(); // Asumsikan model Jurusan ada
        $gelombang = Gelombang::all(); // Asumsikan model Gelombang ada
        dd($peserta);
    }
    public function updatePeserta(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|boolean',
        ]);
        try {
            $peserta = Peserta::find($id);
            $peserta->status = $request->input('status');
            $peserta->save();
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }
        // Validate the request

        // Begin a database transaction

    }
    public function updateStatus(Request $request, $id)
    {
        $peserta = Peserta::find($id);

        if (!$peserta) {
            return response()->json(['message' => 'Peserta tidak ditemukan'], 404);
        }

        $peserta->update([
            'confirm' => 1 // Menandakan bahwa peserta sudah terdaftar
        ]);

        return response()->json(['message' => 'Status peserta berhasil diupdate']);
    }
}
