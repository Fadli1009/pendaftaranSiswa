<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Jurusan::all();
        return view('admin.pages.jurusan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate([
            'nama_jurusan' => 'required',
        ]);
        Jurusan::create($val);
        return redirect()->route('jurusan.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
        return view('admin.pages.jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $val = $request->validate([
            'nama_jurusan' => 'required',
        ]);
        $jurusan->update($val);
        return redirect()->route('jurusan.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
        return redirect()->route('jurusan.index')->with('success', 'Data Berhasil Dihapus');
    }
    public function jurusan_recycle()
    {
        $data = Jurusan::onlyTrashed()->get();
        return view('admin.pages.jurusan.recycle', compact('data'));
    }
    public function restore($id)
    {
        $user = Jurusan::withTrashed()->where('id', $id)->first();
        $user->restore();
        return redirect()->route('jurusan.recycle')->with('success', 'Data Berhasil Dipulihkan');
    }
    public function deletePermanent($id)
    {
        $user = Jurusan::withTrashed()->where('id', $id)->first();
        $user->forceDelete();
        return redirect()->route('jurusan.recycle')->with('success', 'Data Berhasil Dihapus Permanen');
    }
}
