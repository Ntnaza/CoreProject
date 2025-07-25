@extends('layouts.main')

@section('title', 'Beranda')

@section('content')

  @include('sections.hero.index')
  @include('sections.about.index')
  @include('sections.features.index')
  @include('sections.services.index')
  @include('sections.call.index')
  @include('sections.portfolio.index')
  @include('sections.pricing.index')
  @include('sections.faq.index')
  @include('sections.team.index')
  @include('sections.contact.index')
  
@endsection
