@extends('adminlte::page')

@section('title', 'Dashboard Admin')

@section('content_header')
    <h1 class="m-0 text-dark">Dasboard</h1>
@stop
@section('preloader')
    <div class="preloader flex-column justify-content-center align-items-center">
        <style>
            .spinner {
                border: 8px solid #f3f3f3; /* Light grey */
                border-top: 8px solid #3498db; /* Blue */
                border-radius: 50%;
                width: 60px;
                height: 60px;
                animation: spin 1s linear infinite;
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        </style>
        <div class="spinner"></div>
    </div>
@stop

@section('content')
    {{-- Baris untuk Info Box --}}
    {{-- Baris untuk Info Box --}}
<div class="row">
    {{-- Pesan Masuk --}}
    <div class="col-lg-4 col-md-6">
        <div class="small-box bg-info">
            <div class="inner">
                {{-- Tampilkan jumlah pesan dari controller --}}
                <h3>{{ $messageCount }}</h3>
                <p>Pesan Masuk</p>
            </div>
            <div class="icon">
                <i class="fas fa-envelope"></i>
            </div>
            {{-- Arahkan link ke halaman manajemen kontak --}}
            <a href="{{ route('admin.contact.index') }}" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    {{-- Testimoni --}}
    <div class="col-lg-4 col-md-6">
        <div class="small-box bg-success">
            <div class="inner">
                {{-- Tampilkan jumlah testimoni dari controller --}}
                <h3>{{ $testimonialCount }}</h3>
                <p>Total Testimoni</p>
            </div>
            <div class="icon">
                <i class="fas fa-star"></i>
            </div>
            {{-- Arahkan link ke halaman manajemen testimoni --}}
            <a href="{{ route('admin.testimonials.index') }}" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    {{-- Anggota Tim --}}
    <div class="col-lg-4 col-md-6">
        <div class="small-box bg-warning">
            <div class="inner">
                {{-- Tampilkan jumlah anggota tim dari controller --}}
                <h3>{{ $teamMemberCount }}</h3>
                <p>Jumlah Anggota Team</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            {{-- Arahkan link ke halaman manajemen tim --}}
            <a href="{{ route('admin.team-members.index') }}" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
{{-- /.row --}}
    {{-- /.row --}}

    {{-- Baris untuk Konten Utama (Grafik dan Tabel) --}}
    
@stop

@push('js')
    {{-- Import Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data dummy untuk grafik
        const salesData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun"],
            datasets: [{
                label: 'Penjualan',
                data: [1200, 1900, 3000, 5000, 2300, 3100],
                borderColor: 'rgba(0, 123, 255, 1)',
                backgroundColor: 'rgba(0, 123, 255, 0.2)',
                tension: 0.1
            }]
        };

        // Konfigurasi Grafik
        const config = {
            type: 'line',
            data: salesData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Render Grafik
        const salesChart = new Chart(
            document.getElementById('salesChart'),
            config
        );
    </script>
@endpush