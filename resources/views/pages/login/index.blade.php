<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PADIPULSE | Log in</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-ux5ag57RPB8gqHIeB3jkzHv5xUp3o0pgKd6Yoho+RDgMQLdhayHyG9+8DPyWO0xZ" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(to right, #28a745, #218838);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Mengatur tinggi penuh viewport */
            margin: 0;
            font-family: 'Source Sans Pro', sans-serif; /* Menambahkan font */
            position: relative; /* Untuk posisi gambar latar belakang */
            overflow: hidden; /* Menghindari scroll */
        }

        /* Menambahkan gambar latar belakang */
        body::before {
            content: '';
            background: url('{{ asset("dist/img/lgds.jpeg") }}') no-repeat center center fixed; /* Ganti dengan path gambar padi */
            background-size: cover; /* Mengatur gambar agar memenuhi latar belakang */
            opacity: 0.3; /* Mengatur transparansi gambar */
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1; /* Menempatkan gambar di belakang konten */
        }

        .login-box {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            width: 400px; /* Mengatur lebar kotak login */
            padding: 20px; /* Menambahkan padding */
            position: relative; /* Untuk z-index */
            z-index: 2; /* Memastikan kotak login di depan gambar */
        }

        .login-logo a {
            font-family: 'Patua One', cursive; /* Menggunakan font Patua One */
            font-weight: bold;
            font-size: 2.5rem;
            color: #28a745; /* Mengubah warna logo agar sesuai dengan latar belakang */
            text-align: center; /* Memusatkan logo */
        }

        .login-card-body {
            padding: 2rem;
        }

        .input-group-text {
            background-color: #28a745; /* Mengubah latar belakang ikon input menjadi hijau */
            color: white;
        }

        .form-control {
            border-radius: 0; /* Membuat sudut input lebih tajam */
        }

        .btn-primary {
            background-color: #28a745; /* Mengubah tombol menjadi hijau */
            border-color: #28a745;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.3s; /* Efek transisi */
        }

        .btn-primary:hover {
            background-color: #218838; /* Mengubah warna tombol saat hover */
            border-color: #218838;
            transform: scale(1.05); /* Efek membesar saat hover */
        }

        .mb-3 {
            margin-bottom: 1.5rem; /* Menambahkan margin bawah */
        }

        /* Menambahkan efek pada input focus */
        .form-control:focus {
            border-color: #28a745; /* Mengubah warna border saat focus */
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5); /* Menambahkan bayangan */
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/login"><b>PADIPULSE</b></a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <form action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input class="form-control" type="email" name="email" placeholder="Email" required />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input class="form-control" type="password" name="password" placeholder="Password" required />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js?v=3.2.0') }}"></script>
</body>

</html>
