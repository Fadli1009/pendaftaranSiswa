@extends('admin.base')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Users Baru</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" id="nama"
                        value="{{ old('nama_lengkap') }}">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Role</label>
                    <select class="form-select form-control" id="defaultSelect" name="id_level">
                        <option value="" selected>Pilih Role User </option>
                        @foreach ($level as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_role }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" id="jurusanPIC" style="display: none;">
                    <label for="email" class="form-label">PIC Jurusan</label>
                    <select class="form-select form-control" name="id_jurusan[]" multiple>
                        @foreach ($jurusan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_jurusan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#defaultSelect').on('change', function() {
                var selectedValue = $(this).val();
                console.log(selectedValue);

                if (selectedValue === '2') {
                    $('#jurusanPIC').show();
                } else {
                    $('#jurusanPIC').hide();
                }
            });
        });
    </script>
@endsection
