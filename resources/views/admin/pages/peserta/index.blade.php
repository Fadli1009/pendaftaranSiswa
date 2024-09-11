@extends('admin.base')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Peserta</h1>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            {{-- <div class="d-flex justify-content-end my-3">
                <a href="{{ route('gelombang.create') }}" class="btn btn-primary btn-sm">Tambah Gelombang</a>
            </div> --}}
            <div class="table-responsive">
                <table class="display table table-striped table-hover" id="basic-datatables">
                    <thead>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>NIK</th>
                        <th>Jenis Kelamin</th>
                        <th>Kejuruan</th>
                        <th>Nomor HP</th>
                        <th>Status</th>
                        <th>Action </th>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_lengkap }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->kejuruan }}</td>
                                <td>{{ $item->nomorHp }}</td>
                                <td>
                                    <!-- Radio button dengan atribut data-id -->
                                    <input type="radio" class="status-radio" name="aktif" data-id="{{ $item->id }}"
                                        @if ($item->aktig == 1) checked @endif>
                                </td>
                                <td>

                                    <a href="{{ route('peserta.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Filter Siswa</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('cari.jurusan') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="levelSelect" class="col-sm-3 col-form-label">Jurusan</label>
                    <div class="col-sm-9">
                        <select name="level_id" id="levelSelect" class="form-control">
                            <option value="">Select an option</option>
                            @foreach ($jurusan as $lvl)
                                <option value="{{ $lvl->id }}"
                                    {{ isset($level) && $level->id == $lvl->id ? 'selected' : '' }}>
                                    {{ $lvl->nama_jurusan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <!-- Select untuk Tahun Ajaran -->
                    <label for="yearSelect" class="col-sm-6 col-form-label">Pilih Gelombang Ajaran</label>
                    <div class="col-sm-6">
                        <select name="gelombang_id" id="yearSelect" class="form-control">
                            <option value="">Pilih Gelombang Ajaran</option>
                            @foreach ($gelombang as $year)
                                <option value="{{ $year->id }}"
                                    {{ isset($selectedYear) && $selectedYear == $year->id ? 'selected' : '' }}>
                                    {{ $year->nama_gelombang }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button class="btn btn-primary btn-block" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $("#basic-datatables").DataTable({});

            // Handle radio button change event
            $('.status-radio').on('change', function() {
                var radio = $(this);
                var id = radio.data('id');
                var status = radio.is(':checked') ? 1 : 0;

                console.log('ID:', id, 'Status:', status); // Debugging output

                // Send AJAX request to update status
                $.ajax({
                    url: '/gelombang/' + id + '/update-status',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: status
                    },
                    success: function(response) {
                        // Handle success response
                        console.log('Success:', response); // Debugging output
                        alert('Status telah diperbarui!');
                    },
                    error: function(xhr) {
                        // Handle error response
                        console.log('Error:', xhr); // Debugging output
                        alert('Terjadi kesalahan saat memperbarui status.');
                    }
                });
            });
        });
    </script>
@endsection
