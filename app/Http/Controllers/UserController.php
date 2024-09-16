<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use App\Models\Jurusan;
use App\Models\UserJurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'email' => 'required|email|unique:users,email',
            'id_level' => 'required|exists:roles,id',
            'nama_lengkap' => 'required|string|max:255',
            'password' => 'required|min:8',
            'id_jurusan' => 'nullable|array',
            'id_jurusan.*' => 'exists:jurusan,id'
        ]);
        $val['password'] = Hash::make($val['password']);

        DB::beginTransaction();
        try {
            $user = User::create([
                'email' => $val['email'],
                'id_level' => $val['id_level'],
                'nama_lengkap' => $val['nama_lengkap'],
                'password' => $val['password'],
            ]);

            if ($request->id_level == 2 && !empty($request->id_jurusan)) {
                foreach ($request->id_jurusan as $jurusanID) {
                    UserJurusan::create([
                        'id_user' => $user->id,
                        'id_jurusan' => $jurusanID,
                        'id_level' => $user->id_level
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('users.index')->with('success', 'Data Berhasil Ditambahkan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
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
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $levels = Roles::all();
        $jurusan = Jurusan::all();
        $selectedJurusan = UserJurusan::where('id_user', $id)->pluck('id_jurusan')->toArray();

        return view('admin.pages.users.edit', compact('user', 'levels', 'jurusan', 'selectedJurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $val = $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'id_level' => 'required|exists:roles,id',
            'nama_lengkap' => 'required|string|max:255',
            'password' => 'nullable|min:8',
            'id_jurusan' => 'nullable|array',
            'id_jurusan.*' => 'exists:jurusan,id'
        ]);

        DB::beginTransaction();
        try {
            $user->update([
                'email' => $val['email'],
                'id_level' => $val['id_level'],
                'nama_lengkap' => $val['nama_lengkap'],
            ]);

            if ($val['password']) {
                $user->update(['password' => Hash::make($val['password'])]);
            }

            // Update UserJurusan
            UserJurusan::where('id_user', $user->id)->delete();
            if ($val['id_level'] == 2 && !empty($request->id_jurusan)) {
                foreach ($request->id_jurusan as $jurusanId) {
                    UserJurusan::create([
                        'id_user' => $user->id,
                        'id_jurusan' => $jurusanId,
                        'id_level' => $val['id_level']
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('users.index')->with('success', 'Data Berhasil Diperbarui');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
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
    public function user_recycle()
    {
        $data = User::onlyTrashed()->get();
        return view('admin.pages.users.recycle', compact('data'));
    }
    public function restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        $user->restore();
        return redirect()->route('user.recycle')->with('success', 'Data Berhasil Dipulihkan');
    }
    public function deletePermanent($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        $user->forceDelete();
        return redirect()->route('user.recycle')->with('success', 'Data Berhasil Dihapus Permanen');
    }
}
