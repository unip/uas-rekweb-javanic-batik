@php
    $penghasilan = $orders->reduce(function ($total, $item) {
        return $total + $item->total;
    });
@endphp

@extends('layouts.admin')

@section('content')
    <h3>{{ $title }}</h3>

    <div class="grid grid-cols-3 gap-5 mb-5">
        <div class="card bg-white p-5 shadow">
            <h4>Total Order</h4>
            <span class="text-3xl">{{ $orders->count() }}</span>
        </div>
        <div class="card bg-white p-5 shadow">
            <h4>Total Penghasilan</h4>
            <span class="text-3xl">{{ 'Rp' . number_format($penghasilan, 0, '.', '.') }}</span>
        </div>
        <div class="card bg-white p-5 shadow">
            <h4>Total Produk</h4>
            <span class="text-3xl">{{ $products->count() }}</span>
        </div>
    </div>

    <div class="table-orders h-full flex">
        @if ($orders->count() === 0)
            <div class="maaf bg-white p-5 flex-1 flex flex-col items-center justify-center">
                <h3>Orderan Masih Kosong</h3>
                <p class="mb-5">Tambah orderan yuk</p>

                <a href="/admin/order/create" class="btn-primary">Tambah Order</a>
            </div>
        @endif

        @if ($orders->count() > 0)
            <table>
                <thead class="bg-gray-100 border-b border-b-gray-300">
                    <tr>
                        <th class="p-3 text-left">No. Invoice</th>
                        <th class="p-3 text-left">Nama</th>
                        <th class="p-3 text-left">No. HP</th>
                        <th class="p-3 text-left">Pesanan</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr
                            class="border-b border-b-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700 transition duration-200">
                            <td class="p-3 align-top">
                                {{ $item->no_invoice }}
                            </td>
                            <td class="p-3 align-top">
                                {{ $item->nama }}
                            </td>
                            <td class="p-3 align-top">
                                {{ $item->phone }}
                            </td>
                            <td class="p-3 align-top">
                                {{ $item->jumlah_pesanan }}
                                {{ $products->first(function ($p, $key) {
                                    return $item->produk_id === $p->id;
                                })->nama_produk }}
                            </td>
                            <td class="p-3 align-top">
                                {{ $item->status_pembayaran }}
                            </td>
                            <td class="p-3 align-top font-bold dark:text-white">
                                Rp{{ number_format($item->total, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
