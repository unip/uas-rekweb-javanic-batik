@extends('layouts.main')

@section('content')
  <div class="kategori-page">
    {{-- KATEGORRI --}}
    <section class="kategori mb-[67px]">
      <div class="container mt-20">
        <h2 class="text-center">Kategori</h2>

        <div class="flex justify-center text-gray-800 gap-2 mb-20">
          <a href="{{ route('kategori.wanita') }}" @class(['uppercase hover:text-yellow-500 transition duration-200', 'font-black' => request()->is('kategori/batik-wanita')])>Wanita</a>
          ·
          <a href="{{ route('kategori.pria') }}" @class(['uppercase hover:text-yellow-500 transition duration-200', 'font-black' => request()->is('kategori/batik-pria')])>Pria</a>
          ·
          <a href="{{ route('kategori.anak') }}" @class(['uppercase hover:text-yellow-500 transition duration-200', 'font-black' => request()->is('kategori/batik-anak')])>Anak</a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-5">
          @foreach ($kategori as $item)
            <a href="{{ $item['url'] }}" class="aspect-square bg-slate-200 relative group/item overflow-hidden">
              <img src="{{ asset($item['image']) }}" alt="Batik Pria" class="absolute w-full h-full object-cover group-hover/item:scale-110 transition duration-300">
              <div class="absolute w-full h-full bg-gradient-to-t from-slate-200 to-slate-200/0"></div>
              <h4 class="absolute block bottom-5 left-5 right-5">{{ $item['nama'] }}</h4>
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
