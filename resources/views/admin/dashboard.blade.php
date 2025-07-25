@extends('adminlte::page')

@section('title', 'Dasbor Admin')

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
    <div class="row">
        <div class="col-lg-3 col-6">
            {{-- small box --}}
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>
                    <p>Pesanan Baru</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        {{-- ./col --}}
        <div class="col-lg-3 col-6">
            {{-- small box --}}
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>Tingkat Konversi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        {{-- ./col --}}
        <div class="col-lg-3 col-6">
            {{-- small box --}}
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>
                    <p>Pengguna Terdaftar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        {{-- ./col --}}
        <div class="col-lg-3 col-6">
            {{-- small box --}}
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>
                    <p>Pengunjung Unik</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        {{-- ./col --}}
    </div>
    {{-- /.row --}}

    {{-- Baris untuk Konten Utama (Grafik dan Tabel) --}}
    <div class="row">
        {{-- Kolom Kiri - Grafik --}}
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Grafik Penjualan Bulanan</h3>
                </div>
                <div class="card-body">
                    <canvas id="salesChart" style="height: 300px;"></canvas>
                </div>
            </div>
        </div>

        {{-- Kolom Kanan - Produk Terbaru --}}
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Produk Terbaru Ditambahkan</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Produk</th>
                                <th style="width: 40px">Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Data dummy, nantinya bisa di-loop dari controller --}}
                            <tr>
                                <td>1.</td>
                                <td>Laptop Super Canggih</td>
                                <td><span class="badge bg-success">12</span></td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Mouse Gaming RGB</td>
                                <td><span class="badge bg-warning">5</span></td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Keyboard Mekanikal</td>
                                <td><span class="badge bg-primary">20</span></td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Monitor Ultrawide 4K</td>
                                <td><span class="badge bg-danger">2</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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