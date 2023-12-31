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
                  <p class="text-gray-800">Untuk 10 PO pertama di bulan Desember</p>
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
          <a href="#" class="aspect-square bg-slate-200 relative group/item overflow-hidden">
            <img src="{{ asset('images/kategori/batik-pria.png') }}" alt="Batik Pria" class="absolute w-full h-full object-cover group-hover/item:scale-110 transition duration-300">
            <div class="absolute w-full h-full bg-gradient-to-t from-slate-200 to-slate-200/0"></div>
            <h4 class="absolute bottom-5 left-5">Batik Pria</h4>
          </a>
          <a href="#" class="aspect-square bg-slate-200 relative group/item overflow-hidden">
            <img src="{{ asset('images/kategori/batik-wanita.png') }}" alt="Batik Wanita" class="absolute w-full h-full object-cover group-hover/item:scale-110 transition duration-300">
            <div class="absolute w-full h-full bg-gradient-to-t from-slate-200 to-slate-200/0"></div>
            <h4 class="absolute bottom-5 left-5">Batik Wanita</h4>
          </a>
          <a href="#" class="aspect-square bg-slate-200 relative group/item overflow-hidden">
            <img src="{{ asset('images/kategori/batik-anak.png') }}" alt="Batik Anak" class="absolute w-full h-full object-cover group-hover/item:scale-110 transition duration-300">
            <div class="absolute w-full h-full bg-gradient-to-t from-slate-200 to-slate-200/0"></div>
            <h4 class="absolute bottom-5 left-5">Batik Anak</h4>
          </a>
        </div>
      </div>
    </section>

    <section class="reviews mb-[55px]">
      <div class="container">
        <div id="reviewSlider" class="swiper review-wrapper bg-white md:h-[198px] flex items-stretch">
          <button class="swiper-button-prev hidden md:block w-max after:content-none px-8">
            <img src="{{ asset('images/icon-arrow-left.svg') }}" alt="Prev" class="w-[25px] h-[25px]">
          </button>
          <div class="swiper-wrapper">
            @for ($i = 0; $i < 3; $i++)
              <div class="swiper-slide flex flex-col md:flex-row h-full md:items-center gap-5 p-5 md:px-[150px]">
                <div class="avatar shrink-0 w-[100px] aspect-square rounded-[50px] bg-gray-300"></div>
                <div class="text">
                  <h3>Marita Puspita <span class="font-['Nunito_Sans'] italic">- Designer</span></h3>
                  <p>Lorem ipsum dolor sit amet consectetur. Quis egestas ultricies at faucibus praesent sapien in eu amet. Quisque tellus viverra viverra cursus diam volutpat eget velit a.</p>
                </div>
              </div>
            @endfor
          </div>
          <button class="swiper-button-next hidden md:block w-max after:content-none px-8">
            <img src="{{ asset('images/icon-arrow-right.svg') }}" alt="Next" class="w-[25px] h-[25px]">
          </button>
        </div>
      </div>
    </section>

    <section class="pesan">
      <div class="container relative flex flex-col gap-y-10 md:block">
        <div class="caption max-w-[310px] relative md:absolute top-0 left-0">
          <h2 class="text-[48px] leading-[50px]">
            Make your <br>
            own style
          </h2>

          <p class="mb-3">Dengan kualitas jahitan yang kuat, rapi dan bahan yang nyaman digunakan.</p>
          <a href="/order" class="inline-block font-['Kumar_One'] text-gray-800 bg-[var(--color-gold)] hover:brightness-90 px-5 py-3 transition duration-300">
            Pesan Sekarang
          </a>
        </div>
        <img src="{{ asset('images/image-bottom.png') }}" alt="" class="relative ml-auto right-[-77px]">
      </div>
    </section>
  </div>
@endsection

@section('scripts')
  <script>
    const headerSlider = new Swiper('#headerSlider', {
      loop: true,
      autoplay: {
        delay: 5000,
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
      },

      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
@endsection
