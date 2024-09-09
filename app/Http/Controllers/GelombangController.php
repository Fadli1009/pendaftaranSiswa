<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        // Validate the request
        $request->validate([
            'status' => 'required|boolean',
        ]);

        // Begin a database transaction
        DB::beginTransaction();

        try {
            // Set the status of all records to 0
            Gelombang::query()->update(['aktig' => 0]);

            // Update the status of the selected record
            $gelombang = Gelombang::findOrFail($id);
            $gelombang->aktig = $request->input('status');
            $gelombang->save();

            // Commit the transaction
            DB::commit();

            // Return a successful response
            return response()->json(['message' => 'Status telah diperbarui!'], 200);
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();

            // Log the error (optional)
            Log::error('Error updating status: ' . $e->getMessage());

            // Return an error response
            return response()->json(['message' => 'Terjadi kesalahan saat memperbarui status.'], 500);
        }
    }
}
