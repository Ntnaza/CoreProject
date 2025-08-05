{{-- File: resources/views/home.blade.php --}}

@extends('layouts.main') {{-- Memberitahu file ini untuk menggunakan kerangka utama --}}

@section('content') {{-- Mulai mengisi "slot" konten --}}

    {{-- Semua section khusus untuk halaman beranda diletakkan di sini --}}
    @include('sections.hero.index')
    @include('sections.about.index')
    @include('sections.features.index')
    @include('sections.services.index')
    @include('sections.call.index')
    @include('sections.portfolio.index')
    @include('sections.team.index')
    @include('sections.testimonial.index')
    @include('sections.contact.index')

@endsection {{-- Selesai mengisi "slot" --}}