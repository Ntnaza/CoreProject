<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            /* PERBAIKAN 1: Mengatur gambar latar belakang */
            background-image: url('{{ asset("assets/img/me.png") }}'); /* Ganti dengan path gambar Anda */
            background-size: cover;
            background-position: center;
            margin: 0;
            position: relative;
            z-index: 1;
        }
        /* PENAMBAHAN: Lapisan gelap agar kartu login lebih terbaca */
        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: rgba(0, 0, 0, 0.5); /* Hitam dengan 50% opacity */
            z-index: -1;
        }
        .container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            /* PERBAIKAN 2: Kartu dibuat semi-transparan (efek kaca) */
            background-color: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 40px 30px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        .logo-container { text-align: center; margin-bottom: 24px; }
        .logo { height: 50px; }
        .form-group { margin-bottom: 1.5rem; }
        label { display: block; margin-bottom: 0.5rem; font-weight: 500; color: #e5e7eb; } /* Warna label diubah */
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #4b5563;
            border-radius: 8px;
            box-sizing: border-box;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }
        .form-footer { display: flex; justify-content: flex-end; align-items: center; margin-top: 1.5rem; }
        .btn-login { background-color: #FFA500; color: white; border: none; padding: 10px 24px; border-radius: 8px; font-weight: bold; cursor: pointer; transition: background-color 0.3s; }
        .btn-login:hover { background-color: #E59400; }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="container">
        <div class="login-card">
            @yield('content')
        </div>
    </div>
</body>
</html>