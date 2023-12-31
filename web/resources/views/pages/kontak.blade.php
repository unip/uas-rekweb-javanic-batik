@extends('layouts.main')

@section('content')
  <div class="order-page">
    <section class="kategori mb-[67px]">
      <div class="container mt-20">
        <h2 class="text-center">{{ $title }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-[45px]">
          <form action="" class="buat-pesanan">
            @csrf
            @method('post')

            <p class="mb-5">Ada sesuatu yang ingin Anda tanyakan? Kami akan membalas
              Anda via WhatsApp chat atau telepon (sesuai permintaan).</p>
            
            <label for="nama" class="flex flex-col gap-2 mb-4">
              <span>Nama</span>
              <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap">
              @error('nama')
                <small class="text-red-400">{{ $messag }}</small>
              @enderror
            </label>
            <label for="email" class="flex flex-col gap-2 mb-4">
              <span>Email</span>
              <input type="email" id="email" name="email" placeholder="E.g. joko@example.com">
              @error('email')
                <small class="text-red-400">{{ $messag }}</small>
              @enderror
            </label>
            <label for="pesan" class="flex flex-col gap-2 mb-4">
              <span>Pesan</span>
              <textarea name="pesan" id="pesan" rows="3" placeholder="Tulis pesan..."></textarea>
              @error('pesan')
                <small class="text-red-400">{{ $messag }}</small>
              @enderror
            </label>

            <button class="btn-primary uppercase w-full mt-4">
              Kirim
            </button>
          </form>

          <div class="flex flex-col gap-5">
            <div class="alamat bg-white px-[30px] py-[27px]">
              <h3>Gallery Prawirotaman</h3>
              <div>
                Jl. Prawirotaman II No. 839B <br>
                +62274 458 0008 <br>
                +62 877 0005 8444 <br>
                <a href="mailto:info@galleryprawirotamanhotel.com" class="hover:text-yellow-500">
                  info@galleryprawirotamanhotel.com
                </a>
              </div>
            </div>
            <div class="alamat bg-white px-[30px] py-[27px]">
              <h3>Yogyakarta Intl Airport (YIA)</h3>
              <div>Ngringit, Palihan, Temon, Kulon Progo Regency, Special Region of Yogyakarta 55654</div>
            </div>
          </div>
        </div>
      </div>
    </section>

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
