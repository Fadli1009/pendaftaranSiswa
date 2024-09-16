@extends('admin.base')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Gelombang</h1>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
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
                                <td>{{ $item->nama_gelombang }}</td>
                                <td>
                                    <form action="{{ route('gelombang.restore', $item->id) }}" style="display: inline-block"
                                        method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-info btn-sm">Restore</button>
                                    </form>
                                    <form action="{{ route('gelombang.deletePermanent', $item->id) }}"
                                        style="display: inline-block" method="POST">
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

                // Set status for all radio buttons to 0
                $('.status-radio').each(function() {
                    var otherId = $(this).data('id');
                    if (otherId !== id) {
                        $(this).prop('checked', false);
                    }
                });

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
