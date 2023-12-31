{{-- @dd(request()->is('/')) --}}

@extends('layouts.base')

@section('css')

  @yield('links')
    
@endsection

@section('child')
  @include('components.nav')

  @yield('content')
    
  @include('components.footer')
@endsection

@section('js')

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  @yield('scripts')
    
@endsection
