<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Roles;
use App\Models\User;
use App\Models\UserJurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('admin.pages.users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $level = Roles::all();
        $jurusan = Jurusan::all();
        return view('admin.pages.users.create', compact('level', 'jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate([
            'email' => 'required',
            'id_level' => 'required',
            'nama_lengkap' => 'required',
            'password' => 'required'
        ]);
        $val['password'] = Hash::make($val['password']);
        // dd($val);
        User::create($val);
        UserJurusan::create([
            'id_level' => $val['id_level'],
            'id_jurusan' => $request->id_jurusan
        ]);
        return redirect()->route('users.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $level = Roles::all();
        $users = User::find($id);
        $jurusan = Jurusan::all();
        $selectJurusan = UserJurusan::where('id_level', $users->id_level)->first();
        // dd($selectJurusan->id_jurusan);
        // $cek = UserJurusan
        return view('admin.pages.users.edit', compact('users', 'level', 'jurusan', 'selectJurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::find($id);
        $val = $request->validate([
            'email' => 'required',
            'id_level' => 'required',
            'nama_lengkap' => 'required',
            'password' => 'nullable'
        ]);
        if ($request->filled('password')) {
            $val['password'] = Hash::make($val['password']);
        } else {
            unset($val['password']);
        }
        $users->update($val);
        return redirect()->route('users.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->route('users.index')->with('success', 'Data Berhasil Dihapus');
    }
}
