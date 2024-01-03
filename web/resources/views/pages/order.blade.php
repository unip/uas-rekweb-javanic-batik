@php
    $pesanan_terkini = [
        [
            'no' => '005',
            'status' => 'Belum Lunas',
            'harga' => '300000',
            'model' => [
                'nama' => 'Blouse Batik',
                'kategori' => ['nama' => 'Batik Wanita'],
            ],
            'qty' => 2,
            'resi' => '-',
        ],
        [
            'no' => '006',
            'status' => 'Belum Lunas',
            'harga' => '300000',
            'model' => [
                'nama' => 'Blouse Batik',
                'kategori' => ['nama' => 'Batik Wanita'],
            ],
            'qty' => 1,
            'resi' => '-',
        ],
        [
            'no' => '003',
            'status' => 'Pengerjaan',
            'harga' => '300000',
            'model' => [
                'nama' => 'Kemeja Batik',
                'kategori' => ['nama' => 'Batik Wanita'],
            ],
            'qty' => 2,
            'resi' => '-',
        ],
        [
            'no' => '004',
            'status' => 'Pengiriman',
            'harga' => '300000',
            'model' => [
                'nama' => 'Kemeja Batik Pendek',
                'kategori' => ['nama' => 'Batik Pria'],
            ],
            'qty' => 1,
            'resi' => '123456789',
        ],
    ];
@endphp

@extends('layouts.main')

@section('content')
    <div class="order-page" x-data="{ showModal: false }">
        <section class="kategori mb-[67px]">
            <div class="container mt-20">
                <h2 class="text-center">Order</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-[45px]">
                    {{-- BUAT PESANAN --}}
                    <form action="" class="buat-pesanan">
                        @csrf
                        @method('post')

                        <h4 class="uppercase mb-5">Buat Pesanan</h4>

                        <p class="mb-5">Masukkan detail pesanan Anda dibawah ini. Kami akan menghubungi
                            Anda via WhatsApp chat atau telepon (sesuai permintaan).</p>

                        <label for="noHP" class="flex flex-col gap-2 mb-4">
                            <span>No. HP</span>
                            <input type="text" id="noHP" name="noHP" placeholder="E.g. 08123456789">
                            @error('noHP')
                                <small class="text-red-400">{{ $messag }}</small>
                            @enderror
                        </label>
                        <label for="nama" class="flex flex-col gap-2 mb-4">
                            <span>Nama</span>
                            <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap">
                            @error('nama')
                                <small class="text-red-400">{{ $messag }}</small>
                            @enderror
                        </label>
                        <label for="model" class="flex flex-col gap-2 mb-4">
                            <span>Model</span>
                            <select name="model" id="model">
                                <option value="">Pilih model</option>
                                <option value="1">Model 1</option>
                                <option value="2">Model 2</option>
                            </select>
                            @error('model')
                                <small class="text-red-400">{{ $messag }}</small>
                            @enderror
                        </label>
                        <label for="qty" class="flex flex-col gap-2 mb-4">
                            <span>Jumlah</span>
                            <input type="number" id="qty" name="qty" value="1">
                            @error('qty')
                                <small class="text-red-400">{{ $messag }}</small>
                            @enderror
                        </label>
                        <label for="alamat" class="flex flex-col gap-2 mb-4">
                            <span>Alamat</span>
                            <textarea name="alamat" id="alamat" rows="3" placeholder="Jl. Merdeka No. 123"></textarea>
                            @error('alamat')
                                <small class="text-red-400">{{ $messag }}</small>
                            @enderror
                        </label>

                        <button class="btn-primary uppercase w-full mt-4">
                            Pesan
                        </button>
                    </form>
                    {{-- BUAT PESANAN --}}

                    {{-- CEK PESANAN --}}
                    <div class="cek-pesanan">
                        <form action="" class="mb-10">
                            @csrf
                            @method('post')

                            <h4 class="uppercase mb-5">Cek Pesanan</h4>

                            <p class="mb-5">Cukup masukkan no. hp yang Anda gunakan untuk memesan,
                                semua pesanan akan muncul menurut no. hp Anda.</p>

                            <label for="noHpPesanan" class="flex flex-col gap-2 mb-4">
                                <span>No. HP</span>
                                <input type="text" id="noHpPesanan" name="noHpPesanan" placeholder="E.g. 08123456789">
                                @error('noHpPesanan')
                                    <small class="text-red-400">{{ $messag }}</small>
                                @enderror
                            </label>

                            <button class="btn-primary uppercase w-full mt-4">
                                Cek Pesanan
                            </button>
                        </form>

                        <div class="pesanan">
                            <h4 class="uppercase mb-5">Pesanan Anda</h4>

                            <div class="flex flex-col gap-3">
                                <div class="section-header bg-gray-800/5 px-5 py-3">Terkini</div>
                                @foreach ($pesanan_terkini as $p)
                                    <button type="button" @click="showModal = true"
                                        class="item flex gap-3 bg-white hover:bg-gray-50 p-5 transition duration-200">
                                        <dl>
                                            <dt class="text-xs text-gray-400">No. Order</dt>
                                            <dd class="font-bold">{{ $p['no'] }}</dd>
                                        </dl>
                                        <dl class="flex-1">
                                            <dt class="text-xs text-gray-400">Status</dt>
                                            <dd class="flex flex-col">
                                                <span class="font-bold">{{ $p['status'] }}</span>
                                                @if ($p['status'] === 'Belum Lunas')
                                                    <span>Rp{{ number_format($p['harga'], 0, '.', ',') }}</span>
                                                @endif
                                                @if ($p['status'] === 'Pengiriman')
                                                    <small>Resi: 123456789</small>
                                                @endif
                                            </dd>
                                        </dl>
                                        <dl class="flex-1">
                                            <dt class="text-xs text-gray-400">Model</dt>
                                            <dd class="flex flex-col">
                                                <span class="font-bold">{{ $p['qty'] . ' ' . $p['model']['nama'] }}</span>
                                                <span>{{ $p['model']['kategori']['nama'] }}</span>
                                            </dd>
                                        </dl>
                                    </button>
                                @endforeach

                                <div class="section-header bg-gray-800/5 px-5 py-3 mt-4">Lainnya</div>
                                @for ($i = 1; $i < 4; $i++)
                                    <button type="button" @click="showModal = true"
                                        class="item flex gap-3 bg-white hover:bg-gray-50 p-5 transition duration-200 *:flex *:flex-col x:items-start">
                                        <dl>
                                            <dt class="text-xs text-gray-400">No. Order</dt>
                                            <dd class="font-bold">{{ $i }}</dd>
                                        </dl>
                                        <dl class="flex-1">
                                            <dt class="text-xs text-gray-400">Status</dt>
                                            <dd class="flex flex-col">
                                                <span>Pengerjaan</span>
                                            </dd>
                                        </dl>
                                        <dl class="flex-1">
                                            <dt class="text-xs text-gray-400">Model</dt>
                                            <dd class="flex flex-col">
                                                <span class="font-bold">Blouse Batik</span>
                                                <span>Batik Wanita</span>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt class="text-xs text-gray-400">Resi</dt>
                                            <dd>-</dd>
                                        </dl>
                                    </button>
                                @endfor
                            </div>
                        </div>
                    </div>
                    {{-- /CEK PESANAN --}}
                </div>
            </div>


            <!-- Modal -->
            <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
                x-show="showModal" x-transition.opacity x-cloak>
                <!-- Modal inner -->
                <div class="max-w-3xl px-4 py-4 mx-auto text-left bg-white shadow-lg" @click.away="showModal = false"
                    x-show.transition="showModal">
                    <!-- Title / Close-->
                    <div class="flex items-center justify-between bg-gray-100 p-4 mb-4">
                        <h5 class="mr-3 text-black max-w-none">001 - Blouse Batik</h5>

                        <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- content -->
                    <div class="flex gap-4">
                        <img src="{{ asset('/images/kategori/batik-wanita.png') }}" alt=""
                            class="aspect-square">
                        <div class="flex flex-col gap-4">
                            <dl>
                                <dt class="text-xs text-gray-400">Nama Pemesan</dt>
                                <dd>Sri Mulyani</dd>
                            </dl>
                            <dl>
                                <dt class="text-xs text-gray-400">Model</dt>
                                <dd>Batik Wanita - Blouse Batik</dd>
                            </dl>
                            <dl>
                                <dt class="text-xs text-gray-400">Status</dt>
                                <dd>Pengerjaan</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        @include('components.reviews')

        @include('components.order', ['with_cta' => false])
    </div>
@endsection

@section('scripts')
    <script>
        const reviewSlider = new Swiper('#reviewSlider', {
            // Optional parameters
            loop: true,
            autoplay: {
                delay: 2000,
                pauseOnMouseEnter: true,
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endsection
