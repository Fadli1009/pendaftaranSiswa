@extends('admin.base')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Filter Peserta</h1>
            <div class="d-flex justify-content-end my-3">
                <a href="" class="btn btn-primary btn-sm">Print PDF</a>
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
                                <td>{{ $item->jurusan->nama_jurusan }}</td>
                                <td>{{ $item->gelombang->nama_gelombang }}</td>
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
                <a href="{{ route('peserta.index') }}" class="btn btn-primary mt-3">Back</a>
            </div>
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
