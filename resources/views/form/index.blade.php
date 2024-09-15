<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Background gradient and general styling */
        body {
            background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%);
            font-family: 'Roboto', sans-serif;
            padding: 20px;
        }

        .container {
            max-width: 850px;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
        }

        .form-container h2 {
            color: #673ab7;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-label {
            color: #555555;
            font-weight: 500;
        }

        .form-control,
        .form-select {
            border-radius: 12px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #673ab7;
            box-shadow: 0 0 0 .25rem rgba(103, 58, 183, 0.25);
        }

        .btn-primary {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            font-weight: 600;
            padding: 12px;
            transition: background-color 0.3s ease;
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #5730b2 0%, #1a4cd8 100%);
        }

        .invalid-feedback {
            color: #e57373;
        }

        .card {
            background-color: #fafafa;
            border: none;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: relative;
            margin-bottom: 20px;
        }

        .card::before {
            content: '';
            width: 6px;
            background: linear-gradient(180deg, #2196f3, #f44336);
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            border-radius: 16px 0 0 16px;
        }

        ul {
            padding-left: 20px;
        }

        ul li {
            margin-bottom: 8px;
        }

        /* Colorful floating labels */
        .form-floating .form-control,
        .form-floating .form-select {
            background-color: rgba(255, 255, 255, 0.7);
        }

        .form-floating label {
            color: #757575;
            font-weight: 500;
        }

        .form-floating .form-control:focus~label,
        .form-floating .form-select:focus~label {
            color: #673ab7;
        }

        /* Custom scrollbar for the form */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background: #673ab7;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #fafafa;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2>Form Pendaftaran PPKD Jakpus</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Syarat Pendaftaran Card -->
            <div class="card">
                <h4>Syarat Pendaftaran:</h4>
                <ul>
                    <li>Warga Negara Indonesia (WNI).</li>
                    <li>Memiliki KTP dan KK yang masih berlaku.</li>
                    <li>Berusia minimal 18 tahun dan maksimal 35 tahun pada saat pendaftaran.</li>
                    <li>Memiliki pendidikan minimal SD atau sederajat.</li>
                    <li>Sehat jasmani dan rohani.</li>
                    <li>Belum pernah mengikuti pelatihan yang sama sebelumnya.</li>
                    <li>Memiliki komitmen untuk mengikuti seluruh rangkaian pelatihan.</li>
                    <li>Menandatangani pernyataan kesanggupan dan persetujuan syarat dan ketentuan.</li>
                </ul>
            </div>

            <!-- Daftar Jurusan Pelatihan Card -->
            <div class="card">
                <h4>Daftar Jurusan Pelatihan:</h4>
                <ul>
                    <li>Operator Komputer</li>
                    <li>Bahasa Inggris</li>
                    <li>Desain Grafis</li>
                    <li>Tata Boga</li>
                    <li>Tata Graha</li>
                    <li>Teknik Pendingin</li>
                    <li>Teknik Komputer</li>
                    <li>Otomotis Sepeda Motor</li>
                    <li>Jaringan Komputer</li>
                    <li>Barista</li>
                    <li>Bahasa Korea</li>
                    <li>Makeup Artist</li>
                    <li>Video Editor</li>
                    <li>Content Creator</li>
                    <li>Web Programming</li>
                </ul>
            </div>

            <!-- Form Pendaftaran -->
            <form class="needs-validation" novalidate action="{{ route('peserta.store') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="nama_lengkap" class="form-control" id="firstName"
                        placeholder="Nama Lengkap" required>
                    <label for="firstName">Nama Lengkap</label>
                    <div class="invalid-feedback">Nama Lengkap harus diisi.</div>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" name="nik" class="form-control" id="nik" placeholder="NIK Anda"
                        required>
                    <label for="nik">NIK</label>
                    <div class="invalid-feedback">NIk harus diisi.</div>
                </div>
                <input type="hidden" name="id_gelombang" value="{{ $gelombang->id ?? '' }}">
                <div class="form-floating mb-3">
                    <input type="number" name="kartu_keluarga" class="form-control" id="nikkk" placeholder="NIK KK"
                        required>
                    <label for="nikkk">NIK Kartu Keluarga</label>
                    <div class="invalid-feedback">NIk harus diisi.</div>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="jenkel" required name="jenis_kelamin">
                        <option value="" disabled selected>Jenis Kelamin</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                    <label for="jenkel">Jenis Kelamin</label>
                    <div class="invalid-feedback">NIk harus diisi.</div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="tempat_lahir" class="form-control" id="lahir"
                        placeholder="Tempat Lahir" required>
                    <label for="lahir">Tempat Lahir</label>
                    <div class="invalid-feedback">Tempat Lahir harus diisi.</div>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" name="tanggal_lahir" class="form-control" id="lahir"
                        placeholder="Tanggal Lahir" required>
                    <label for="lahir">Tanggal Lahir</label>
                    <div class="invalid-feedback">Tanggal Lahir harus diisi.</div>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" id="education" required name="pendidikan_terakhir">
                        <option value="" disabled selected>Pilih Lulusan Terakhir Anda</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="SMK">SMK</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                    <label for="education">Pendidikan Terakhir</label>
                    <div class="invalid-feedback">Lulusan Terakhir harus diisi.</div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="nama_sekolah" class="form-control" id="sekolah"
                        placeholder="Nama Sekolah" required>
                    <label for="sekolah">Nama Sekolah</label>
                    <div class="invalid-feedback">Nama Sekolah harus diisi.</div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="kejuruan" class="form-control" id="kejuruan"
                        placeholder="Kejuruan Sekolah" required>
                    <label for="kejuruan">Kejuruan Sekolah Anda</label>
                    <div class="invalid-feedback">Kejuruann Sekolah harus diisi.</div>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" name="nomorHp" class="form-control" id="npohp" placeholder="Nomor HP"
                        required>
                    <label for="npohp">Nomor Hp</label>
                    <div class="invalid-feedback">Kejuruann Sekolah harus diisi.</div>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                        required>
                    <label for="email">Email Hp</label>
                    <div class="invalid-feedback">Email harus diisi.</div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="aktivasi_saat_ini" class="form-control" id="npohp"
                        placeholder="Kesibukan saat ini" required>
                    <label for="npohp">Kesibukan Anda</label>
                    <div class="invalid-feedback">Kesibukan Sekolah harus diisi.</div>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="major" required name="id_jurusan">
                        <option value="" disabled selected>Pilih Jurusan Pelatihan Anda</option>
                        @foreach ($jurusan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_jurusan }}</option>
                        @endforeach
                    </select>
                    <label for="major">Jurusan Pelatihan</label>
                    <div class="invalid-feedback">Kejuruan harus diisi.</div>
                </div>

                <!-- Add other form fields similarly -->

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="terms" required>
                    <label class="form-check-label" for="terms">Saya setuju dengan <a href="#">syarat dan
                            ketentuan</a></label>
                    <div class="invalid-feedback">Anda harus menyetujui syarat dan ketentuan.</div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Daftar</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function() {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>
