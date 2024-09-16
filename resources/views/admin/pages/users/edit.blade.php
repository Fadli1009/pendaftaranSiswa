@extends('admin.base')

@section('content')
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                value="{{ old('nama_lengkap', $user->nama_lengkap) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email"
                value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="id_level">Role</label>
            <select class="form-control" id="id_level" name="id_level" required>
                @foreach ($levels as $level)
                    <option value="{{ $level->id }}"
                        {{ old('id_level', $user->id_level) == $level->id ? 'selected' : '' }}>
                        {{ $level->nama_role }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group" id="jurusanPIC" style="{{ old('id_level', $user->id_level) == 2 ? '' : 'display: none;' }}">
            <label for="id_jurusan">PIC Jurusan</label>
            <select class="form-control" id="id_jurusan" name="id_jurusan[]" multiple>
                @foreach ($jurusan as $j)
                    <option value="{{ $j->id }}"
                        {{ in_array($j->id, old('id_jurusan', $selectedJurusan)) ? 'selected' : '' }}>
                        {{ $j->nama_jurusan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="password">Password (biarkan kosong jika tidak ingin mengubah)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

@push('scripts')
    <script>
        document.getElementById('id_level').addEventListener('change', function() {
            var jurusanPIC = document.getElementById('jurusanPIC');
            jurusanPIC.style.display = this.value == 2 ? '' : 'none';
        });
    </script>
@endpush
