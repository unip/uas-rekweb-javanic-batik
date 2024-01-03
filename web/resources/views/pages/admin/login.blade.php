@extends('layouts.base')

@section('child')
    <div class="login-page bg-gray-100 h-screen">
        <div class="container grid place-content-center h-full">
            <img src="{{ asset('/images/logo-javanic-gold.svg') }}" alt="Javanic Batik" width="100" class="mx-auto mb-4">
            <h3 class="mx-auto">Admin Login</h3>
            <form action="{{ route('admin.login.store') }}" method="POST" class="flex flex-col gap-4 p-5 *:flex *:flex-col">
                @csrf
                @method('post')

                @if (session('success'))
                    <div class="bg-green-300 text-green-900 px-4 py-2 mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-200 text-red-900 px-4 py-2 mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-200 text-red-900 px-4 py-2 mb-4 shadow">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <label for="email">
                    <span>Email</span>
                    <input type="email" name="email" id="email" placeholder="Input email">
                </label>

                <label for="password">
                    <span>Password</span>
                    <input type="password" name="password" id="password" placeholder="Input password">
                </label>

                <button class="btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection
