<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Berhasil</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Background gradient */
        body {
            background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%);
            font-family: 'Roboto', sans-serif;
            padding: 20px;
            text-align: center;
            color: #fff;
        }

        .container {
            max-width: 850px;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #673ab7;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.25rem;
            color: #555555;
            margin-bottom: 30px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            font-weight: 600;
            padding: 12px 25px;
            font-size: 1.2rem;
            transition: background-color 0.3s ease;
            border: none;
            border-radius: 8px;
            display: inline-block;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #5730b2 0%, #1a4cd8 100%);
        }

        /* Confetti Animation */
        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #673ab7;
            animation: fall 4s linear infinite;
        }

        @keyframes fall {
            to {
                transform: translateY(100vh) rotate(360deg);
            }
        }

        /* Different confetti colors */
        .confetti:nth-child(odd) {
            background-color: #ff4081;
        }

        .confetti:nth-child(even) {
            background-color: #2196f3;
        }

        /* Random confetti position */
        .confetti:nth-child(1) {
            left: 10%;
            animation-duration: 3s;
        }

        .confetti:nth-child(2) {
            left: 20%;
            animation-duration: 5s;
        }

        .confetti:nth-child(3) {
            left: 30%;
            animation-duration: 2.5s;
        }

        .confetti:nth-child(4) {
            left: 40%;
            animation-duration: 3.5s;
        }

        .confetti:nth-child(5) {
            left: 50%;
            animation-duration: 4s;
        }

        .confetti:nth-child(6) {
            left: 60%;
            animation-duration: 2.8s;
        }

        .confetti:nth-child(7) {
            left: 70%;
            animation-duration: 4.5s;
        }

        .confetti:nth-child(8) {
            left: 80%;
            animation-duration: 3s;
        }

        .confetti:nth-child(9) {
            left: 90%;
            animation-duration: 2.5s;
        }

        .confetti:nth-child(10) {
            left: 95%;
            animation-duration: 3.8s;
        }

        /* Style for Image */
        .success-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 30px;
            border-radius: 8px;
        }
    </style>
</head>

<body>

    <!-- Confetti Animation -->
    <div class="confetti"></div>
    <div class="confetti"></div>
    <div class="confetti"></div>
    <div class="confetti"></div>
    <div class="confetti"></div>
    <div class="confetti"></div>
    <div class="confetti"></div>
    <div class="confetti"></div>
    <div class="confetti"></div>
    <div class="confetti"></div>

    <div class="container">
        <!-- Success Image -->
        <img src="{{ asset('assets/img/thanks.png') }}" alt="Pendaftaran Berhasil" class="success-image">

        <h1>Selamat!</h1>
        <p>Formulir pendaftaran Anda telah berhasil disimpan. Kami akan menghubungi Anda untuk langkah selanjutnya.</p>
        <a href="/" class="btn btn-primary">Kembali ke Beranda</a>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
