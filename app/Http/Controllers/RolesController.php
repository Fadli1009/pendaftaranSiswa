<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Roles::all();
        return view('admin.pages.role.index', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate([
            'nama_role' => 'required'
        ]);
        Roles::create($val);
        return redirect()->route('role.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Roles $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $roles = Roles::find($id);
        return view('admin.pages.role.edit', compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $roles = Roles::find($id);
        $val = $request->validate([
            'nama_role' => 'required'
        ]);
        $roles->update($val);
        return redirect()->route('role.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $roles = Roles::find($id);
        $roles->delete();
        return redirect()->route('role.index')->with('success', 'Data Berhasil Dihapus');
    }
    public function role_recycle()
    {
        $role = Roles::onlyTrashed()->get();
        return view('admin.pages.role.recycle', compact('role'));
    }
    public function restore($id)
    {
        $user = Roles::withTrashed()->where('id', $id)->first();
        $user->restore();
        return redirect()->route('role.recycle')->with('success', 'Data Berhasil Dipulihkan');
    }
    public function deletePermanent($id)
    {
        $user = Roles::withTrashed()->where('id', $id)->first();
        $user->forceDelete();
        return redirect()->route('role.recycle')->with('success', 'Data Berhasil Dihapus Permanen');
    }
}
