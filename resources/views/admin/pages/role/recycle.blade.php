@extends('admin.base')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Roles Reycle</h1>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="d-flex justify-content-end my-3">
                <a href="{{ route('role.create') }}" class="btn btn-primary btn-sm">Add Roles</a>
            </div>
            <div class="table-responsive">
                <table class="display table table-striped table-hover" id="basic-datatables">
                    <thead>
                        <th>No</th>
                        <th>Nama Role</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($role as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_role }}</td>
                                <td>
                                    <form action="{{ route('role.restore', $item->id) }}" style="display: inline-block"
                                        method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-info btn-sm">Restore</button>
                                    </form>
                                    <form action="{{ route('role.deletePermanent', $item->id) }}"
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
    <script>
        $(document).ready(function() {
            $("#basic-datatables").DataTable({});
        });
    </script>
@endsection
