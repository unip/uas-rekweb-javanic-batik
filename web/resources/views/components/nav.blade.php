<nav class="py-[20px] md:pb-[45px] md:pt-[83px] z-10 relative">
  <div class="relative">
    <div class="logo-wrapper w-[272px] h-[272px] md:w-[580px] md:h-[580px] rounded-[290px] bg-white/50 backdrop-blur-[20px] absolute bottom-[-63px] left-[-87px] md:bottom-[-184px] md:left-[-55px] flex items-end justify-end md:justify-center pb-[55px] pr-[55px] md:pb-[125px] md:right-[unset]">
      <a href="/"><img src="{{ asset('images/logo-javanic-dark.svg') }}" alt="Javanic Batik" class="w-[100px] md:w-auto"></a>
    </div>
    <div class="container mx-auto">
      <div class="menu-wrapper hidden md:flex justify-end gap-4 uppercase font-black">
        <a href="/" @class(['hover:text-gray-800 transition duration-300', 'text-gray-800' => request()->is('/')])>Home</a>
        <a href="/kategori" @class(['hover:text-gray-800 transition duration-300', 'text-gray-800' => request()->is('kategori*')])>Kategori</a>
        <a href="/order" @class(['hover:text-gray-800 transition duration-300', 'text-gray-800' => request()->is('order*')])>Order</a>
        <a href="/kontak" @class(['hover:text-gray-800 transition duration-300', 'text-gray-800' => request()->is('kontak*')])>Kontak</a>
      </div>
      <button class="block md:hidden ml-auto">
        <img src="{{ asset('images/icon-burger.svg') }}" alt="menu">
      </button>
    </div>
  </div>
</nav>
