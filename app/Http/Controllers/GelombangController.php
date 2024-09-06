<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use Illuminate\Http\Request;

class GelombangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Gelombang::all();
        return view('admin.pages.gelombang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.gelombang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate([
            'nama_gelombang' => 'required',
        ]);
        Gelombang::create($val);
        return redirect()->route('gelombang.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gelombang $gelombang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $roles = Gelombang::find($id);
        return view('admin.pages.gelombang.edit', compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $roles = Gelombang::find($id);
        $val = $request->validate([
            'nama_gelombang' => 'required'
        ]);
        $roles->update($val);
        return redirect()->route('gelombang.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $roles = Gelombang::find($id);
        $roles->delete();
        return redirect()->route('gelombang.index')->with('success', 'Data Berhasil Dihapus');
    }

    // app/Http/Controllers/GelombangController.php

    public function updateStatus(Request $request, $id)
    {
        $gelombang = Gelombang::findOrFail($id);
        $gelombang->aktig = $request->input('status');
        $gelombang->save();

        return response()->json(['success' => true]);
    }
}
