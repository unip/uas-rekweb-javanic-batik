@extends('layouts.admin')

@section('content')
    <h3>{{ $title }}</h3>

    <div class="grid grid-cols-3 gap-5">
        <div class="card bg-white p-5 shadow">
            <h4>Total Order</h4>
            <span class="text-3xl">{{ count($orders) }}</span>
        </div>
    </div>
@endsection
