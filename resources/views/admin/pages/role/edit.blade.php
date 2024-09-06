@extends('admin.base')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data User</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('role.update', $roles->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="nama" class="form-label">Nama Role</label>
                    <input type="text" class="form-control" name="nama_role" id="nama"
                        value="{{ $roles->nama_role }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
