{{-- REVIEWS --}}
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
{{-- /REVIEWS --}}
