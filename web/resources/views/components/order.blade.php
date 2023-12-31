{{-- ORDER --}}
<section class="order">
  <div class="container relative flex flex-col gap-y-10 md:block overflow-hidden md:overflow-visible">
    <div class="caption max-w-[310px] relative md:absolute top-0 left-0 md:left-[32px] lg:left-0">
      <h2 class="text-[48px] leading-[50px]">
        Make your <br>
        own style
      </h2>

      <p class="mb-3">Dengan kualitas jahitan yang kuat, rapi dan bahan yang nyaman digunakan.</p>

      @if ($with_cta)
        <a href="/order" class="btn-primary font-['Kumar_One']">
          Pesan Sekarang
        </a>
      @endif
    </div>
    <img src="{{ asset('images/image-bottom.png') }}" alt="" class="relative ml-auto right-[-77px]">
  </div>
</section>
{{-- /ORDER --}}
