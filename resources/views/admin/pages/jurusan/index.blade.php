@extends('admin.base')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Jurusan</h1>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="d-flex justify-content-end my-3">
                <a href="{{ route('jurusan.create') }}" class="btn btn-primary btn-sm">Tambah Jurusan</a>
            </div>
            <div class="table-responsive">
                <table class="display table table-striped table-hover" id="basic-datatables">
                    <thead>
                        <th>No</th>
                        <th>Gelombang</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_jurusan }}</td>
                                <td>
                                    <a href="{{ route('jurusan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('jurusan.destroy', $item->id) }}" style="display: inline-block"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
