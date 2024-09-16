@extends('admin.base')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Data Users</h1>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="d-flex justify-content-end my-3">
                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm me-2">Tambah Users</a>
                <a href="{{ route('users.create') }}" class="btn btn-danger btn-sm">Recyle Users</a>
            </div>
            <div class="table-responsive">
                <table class="display table table-striped table-hover" id="basic-datatables">
                    <thead>
                        <th>No</th>
                        <th>Level</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->level->nama_role ?? '' }}</td>
                                <td>{{ $item->nama_lengkap ?? '' }}</td>
                                <td>{{ $item->email ?? '' }}</td>

                                <td>
                                    <a href="{{ route('user.restore', $item->id) }}"
                                        class="btn btn-warning btn-sm">Recycle</a>
                                    <form action="{{ route('user.deletePermanent', $item->id) }}"
                                        style="display: inline-block" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete Permanent</button>
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

        });
    </script>
@endsection
