@extends('layouts.guest')

@section('content')

    <div class="logo-container">
        <a href="/">
            {{-- PERBAIKAN 3: Ganti h2 dengan tag img untuk logo --}}
            <img src="{{ asset('assets/img/favicon.png') }}" alt="Core Project Logo" class="logo">
        </a>
        <h2 class="text-white">Selamat Datang Admin</h2>
    </div>
    
    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-footer">
            <button type="submit" class="btn-login">
                Log In
            </button>
        </div>
    </form>

@endsection