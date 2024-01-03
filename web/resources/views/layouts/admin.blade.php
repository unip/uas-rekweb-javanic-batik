@php
    $username = Session::get('user')['username'];
@endphp

@extends('layouts.base')

@section('css')
    @yield('styles')
@endsection

@section('js_header')
    @yield('scripts_header')
@endsection

@section('child')
    <div x-data="{ menuOpen: false }" class="admin-dashboard-page flex flex-col bg-gray-100 min-h-screen">
        <header class="flex items-center bg-white h-[70px] p-5 gap-5">
            <img src="{{ asset('/images/logo-javanic-dark.svg') }}" alt="Javanic Batik" class="max-h-full">

            <button type="button" class="user-menu ml-auto flex items-center gap-5 relative" @click="menuOpen = true">
                <span class="font-bold">{{ $username }}</span>
                <div class="aspect-square w-[40px] grid place-content-center rounded-full bg-yellow-500">
                    <span class="font-bold text-lg text-white uppercase">
                        {{ $username[0] }}
                    </span>
                </div>

                <div x-cloak x-show="menuOpen" @click.outside="menuOpen = false" x-transition
                    class="dropdown w-[150px] absolute flex flex-col items-start gap-3 bg-white p-5 shadow-lg top-full right-0 mt-5">
                    <a href="/admin/settings" class="hover:text-yellow-500">Settings</a>
                    <form action="{{ route('admin.logout') }}" method="POST" class="block">
                        @csrf @method('post')
                        <input type="submit" class="hover:text-yellow-500 hover:cursor-pointer" value="Log out" />
                    </form>
                </div>
            </button>
        </header>
        <div class="flex flex-1">
            <aside class="flex flex-col gap-5 bg-gray-800 text-white p-5 w-[280px]">
                <a href="{{ route('admin.dashboard') }}" @class([
                    'hover:text-yellow-500 text-2xl',
                    'text-yellow-500' => request()->is('admin/dashboard'),
                ])>Dashboard</a>
                <a href="/admin/orders" @class([
                    'hover:text-yellow-500 text-2xl',
                    'text-yellow-500' => request()->is('admin/orders*'),
                ])>Orders</a>
                <a href="/admin/products" @class([
                    'hover:text-yellow-500 text-2xl',
                    'text-yellow-500' => request()->is('admin/products*'),
                ])>Produk</a>
                <a href="/admin/categories" @class([
                    'hover:text-yellow-500 text-2xl',
                    'text-yellow-500' => request()->is('admin/categories*'),
                ])>Kategori</a>

                <hr class="border-gray-600">

                <a href="/admin/settings" @class([
                    'hover:text-yellow-500 text-2xl',
                    'text-yellow-500' => request()->is('admin/settings'),
                ])>Settings</a>
            </aside>

            <main class="flex-1 flex flex-col p-5">

                @yield('content')

            </main>
        </div>
    </div>
@endsection

@section('js')
    @yield('scripts')
@endsection
