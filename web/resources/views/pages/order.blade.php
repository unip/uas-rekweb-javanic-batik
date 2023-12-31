@extends('layouts.main')

@section('content')
  <div class="order-page">
    <section class="kategori mb-[67px]">
      <div class="container mt-20">
        <h2 class="text-center">Order</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-[45px]">
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

          <form action="" class="buat-pesanan">
            @csrf
            @method('post')

            <h4 class="uppercase mb-5">Cek Pesanan</h4>

            <p class="mb-5">Cukup masukkan no. hp yang Anda gunakan untuk memesan,
              semua pesanan akan muncul menurut no. hp Anda.</p>
            
            <label for="noHP" class="flex flex-col gap-2 mb-4">
              <span>No. HP</span>
              <input type="text" id="noHP" name="noHP" placeholder="E.g. 08123456789">
              @error('noHP')
                <small class="text-red-400">{{ $messag }}</small>
              @enderror
            </label>

            <button class="btn-primary uppercase w-full mt-4">
              Cek Pesanan
            </button>
          </form>
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
