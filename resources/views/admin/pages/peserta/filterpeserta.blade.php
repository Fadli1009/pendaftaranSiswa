@extends('admin.base')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Filter Peserta</h1>
            <div class="d-flex justify-content-end my-3">
                <a href="datapeserta/" class="btn btn-primary btn-sm">Print PDF</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-striped table-hover" id="basic-datatables">
                    <thead>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>NIK</th>
                        <th>Jenis Kelamin</th>
                        <th>Jurusan</th>
                        <th>Gelombang</th>
                        <th>Status</th>
                        <th>Action </th>
                    </thead>
                    <tbody>
                        @foreach ($peserta as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_lengkap }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->kejuruan }}</td>
                                <td>{{ $item->nomorHp }}</td>
                                @if (auth()->user()->id_level != 3)
                                    <td>anda tidak memiliki akses</td>
                                @else
                                    <td>
                                        <!-- Radio button untuk "Lolos" -->
                                        <input type="radio" class="status-radio" name="status_{{ $item->id }}"
                                            id="status_lolos_{{ $item->id }}" data-id="{{ $item->id }}"
                                            value="1" @if ($item->status == 1) checked @endif>
                                        <label for="status_lolos_{{ $item->id }}">Lolos</label>

                                        <!-- Radio button untuk "Tidak Lolos" -->
                                        <input type="radio" class="status-radio" name="status_{{ $item->id }}"
                                            id="status_tidak_lolos_{{ $item->id }}" data-id="{{ $item->id }}"
                                            value="0" @if ($item->status == 0) checked @endif>
                                        <label for="status_tidak_lolos_{{ $item->id }}">Tidak Lolos</label>
                                    </td>
                                @endif

                                <td>
                                    <a href="{{ route('peserta.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('peserta.index') }}" class="btn btn-primary mt-3">Back</a>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $("#basic-datatables").DataTable({});
            $('.status-radio').on('change', function() {
                var itemId = $(this).data('id');
                var status = $(this).val();
                console.log('Item ID:', itemId);
                console.log('Status:', status);

                $.ajax({
                    url: `/peserta/${itemId}/seleksi`,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: status
                    },
                    success: function(response) {
                        console.log('Response:', response); // Log response for debugging
                        alert('Peserta berhasil diseleksi');
                    },
                    error: function(xhr) {
                        console.log('XHR:', xhr); // Log xhr object for debugging
                        alert('Error: ' + xhr.status + ' ' + xhr.statusText);
                    }
                });
            });
        });
    </script>
@endsection
