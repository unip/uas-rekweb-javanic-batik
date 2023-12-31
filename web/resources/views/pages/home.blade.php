@php
  $kategori = [
    [
      'nama' => 'Batik Pria',
      'image' => 'images/kategori/batik-pria.png',
      'url' => '/kategori/batik-pria'
    ],
    [
      'nama' => 'Batik Wanita',
      'image' => 'images/kategori/batik-wanita.png',
      'url' => '/kategori/batik-wanita'
    ],
    [
      'nama' => 'Batik Anak',
      'image' => 'images/kategori/batik-anak.png',
      'url' => '/kategori/batik-anak'
    ],
  ];
@endphp

@extends('layouts.main')

@section('content')
  <div class="home-page">
    <section class="header-slider mb-[45px]">
      <div class="container">
        <div id="headerSlider" class="swiper">
          <div class="swiper-wrapper">
            @for ($i = 0; $i < 3; $i++)
              <div class="swiper-slide relative w-full h-[378px] bg-[var(--color-gold)]">
                <img
                  alt=""
                  src="{{ asset('images/slider/bg-header-1.png') }}"
                  class="h-full w-1/2 object-cover object-left ml-auto">
                
                <div class="caption absolute bottom-0 left-0 p-5 mb-8">
                  <p class="title font-black text-gray-800 text-[32px]">Promo Akhir Tahun</p>
                  <p class="font-['Kumar_One'] text-white text-[40px]">Discount 50%</p>
                  <p class="text-gray-800">Untuk 10 order pertama di bulan Desember</p>
                </div>
              </div>
            @endfor
          </div>

          <div class="swiper-pagination !w-max !bottom-5 !left-5"></div>
        </div>
      </div>
    </section>

    {{-- KATEGORRI --}}
    <section class="kategori mb-[67px]">
      <div class="container">
        <h2>Kategori</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-5">
          @foreach ($kategori as $item)
            <a href="{{ $item['url'] }}" class="aspect-square bg-slate-200 relative group/item overflow-hidden">
              <img src="{{ asset($item['image']) }}" alt="Batik Pria" class="absolute w-full h-full object-cover group-hover/item:scale-110 transition duration-300">
              <div class="absolute w-full h-full bg-gradient-to-t from-slate-200 to-slate-200/0"></div>
              <h4 class="absolute bottom-5 left-5">{{ $item['nama'] }}</h4>
            </a>
          @endforeach
        </div>
      </div>
    </section>

    @include('components.reviews')

    @include('components.order', ['with_cta' => true])
  </div>
@endsection

@section('scripts')
  <script>
    const headerSlider = new Swiper('#headerSlider', {
      loop: true,
      autoplay: {
        delay: 5000,
        pauseOnMouseEnter: true,
      },
      pagination: {
        el: '#headerSlider .swiper-pagination',
        bulletActiveClass: 'bg-white opacity-100',
        clickable: true,
      },
    });

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
