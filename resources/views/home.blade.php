{{-- File: resources/views/home.blade.php --}}

@extends('layouts.main') {{-- Menggunakan "bingkai" utama --}}

@section('content') {{-- Mulai mengisi area kosong di bingkai --}}

    {{-- Semua section untuk halaman beranda diletakkan di sini --}}
    @include('sections.hero.index')
    @include('sections.about.index')
    @include('sections.features.index')
    @include('sections.services.index')
    @include('sections.call.index')
    @include('sections.portfolio.index')
    @include('sections.team.index')
    @include('sections.testimonial.index') 
    @include('sections.galeri.index') 
    @include('sections.contact.index') 

@endsection