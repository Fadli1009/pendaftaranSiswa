<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Terima Kasih</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #e8f5e9;
            /* Soft green background */
            color: #2e7d32;
            /* Dark green text */
        }

        .thank-you-container {
            text-align: center;
            margin-top: 50px;
            background-color: #ffffff;
            /* White background for the card */
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .thank-you-container h1 {
            color: #43a047;
            /* Bright green for the heading */
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }

        .thank-you-container p {
            font-size: 1.2rem;
            color: #388e3c;
            /* Slightly darker green */
        }

        .thank-you-container img {
            max-width: 80%;
            height: auto;
            border-radius: 10px;
            margin-top: 20px;
        }

        .btn-primary {
            background-color: #66bb6a;
            /* Light green button */
            border-color: #66bb6a;
        }

        .btn-primary:hover {
            background-color: #57a05b;
            /* Slightly darker green on hover */
            border-color: #57a05b;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="thank-you-container">
            <h1 class="mb-4">🎉 Terima Kasih! 🎉</h1>
            <p>Terima kasih telah mendaftar. Kami telah menerima informasi Anda dan akan segera memprosesnya.</p>
            <img src="{{ asset('assets/img/thanks.png') }}" alt="Terima Kasih Kartun" class="img-fluid" width="500">
            {{-- <div class="mt-4">
                <a href="/" class="btn btn-primary">Kembali ke Beranda</a>
            </div> --}}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
