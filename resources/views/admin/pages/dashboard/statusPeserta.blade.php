@extends('admin.base')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Data Peserta</div>
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
                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge badge-success">Lolos</span>
                                    @else
                                        <span class="badge badge-danger">Tidak Lolos</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('peserta.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">Back</a>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $("#basic-datatables").DataTable({});
        });
    </script>
@endsection
