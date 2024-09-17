@extends('admin.base')

@section('content')
    <div class="mt-5">
        <h2 class="text-center mb-4 text-primary">Detail Peserta Pendaftaran</h2>

        <div class="card border-primary mb-3">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">Informasi Peserta</h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>ID Jurusan:</strong>
                        <span class="badge bg-info text-white">{{ $peserta->jurusan->nama_jurusan ?? '' }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>ID Gelombang:</strong>
                        <span class="badge bg-info text-white">{{ $peserta->gelombang->nama_gelombang ?? '' }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Keterangan:</strong>
                        <span>
                            @if ($peserta->status === 1)
                                <span class="badge badge-success">Lolos</span>
                            @else
                                <span class="badge badge-danger">Tidak Lolos</span>
                            @endif
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Nama Lengkap:</strong>
                        <span>{{ $peserta->nama_lengkap ?? '' }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>NIK:</strong>
                        <span class="badge bg-info text-white">{{ $peserta->nik ?? '' }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Kartu Keluarga:</strong>
                        <span class="badge bg-info text-white">{{ $peserta->kartu_keluarga ?? 'Tidak Ada' }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Jenis Kelamin:</strong>
                        <span>{{ $peserta->jenis_kelamin ?? 'Tidak Ada' }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Kesibukan Saat Ini</strong>
                        <span>{{ $peserta->aktivasi_saat_ini ?? 'Tidak Ada' }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Tempat Lahir:</strong>
                        <span>{{ $peserta->tempat_lahir ?? 'Tidak Ada' }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Tanggal Lahir:</strong>
                        <span>{{ \Carbon\Carbon::parse($peserta->tanggal_lahir)->format('d-m-Y') ?? 'Tidak Ada' }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Pendidikan Terakhir:</strong>
                        <span>{{ $peserta->pendidikan_terakhir ?? 'Tidak Ada' }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Nama Sekolah:</strong>
                        <span>{{ $peserta->nama_sekolah ?? 'Tidak Ada' }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Kejuruan:</strong>
                        <span>{{ $peserta->kejuruan ?? 'Tidak Ada' }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Nomor HP:</strong>
                        <span>{{ $peserta->nomorHp ?? 'Tidak Ada' }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Email:</strong>
                        <span>{{ $peserta->email ?? 'Tidak Ada' }}</span>
                    </li>

                </ul>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('peserta.index') }}" class="btn btn-primary">
                <i class="bi bi-arrow-left"></i> Kembali ke Daftar Peserta
            </a>
        </div>
    </div>

    @push('styles')
        <style>
            .card-header {
                border-radius: 0.25rem 0.25rem 0 0;
                font-size: 1.25rem;
            }

            .list-group-item {
                border: 1px solid #ddd;
                border-radius: 0.25rem;
                padding: 1rem;
            }

            .badge {
                font-size: 0.875rem;
                padding: 0.5rem 0.75rem;
                border-radius: 0.25rem;
            }

            .btn-primary {
                background-color: #007bff;
                border-color: #007bff;
            }

            .btn-primary:hover {
                background-color: #0056b3;
                border-color: #004085;
            }

            .text-primary {
                color: #007bff !important;
            }
        </style>
    @endpush
@endsection
