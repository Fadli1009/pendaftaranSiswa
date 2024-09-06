@extends('admin.base')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Golongan Baru</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('gelombang.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nama" class="form-label">Nama Jurusan</label>
                    <input type="text" class="form-control" name="nama_gelombang" id="nama">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
