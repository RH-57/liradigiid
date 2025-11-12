<header
  x-data="{ open: false, scrolled: false, dropdown: false }"
  x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 50)"
  :class="scrolled ? 'bg-[#136ad5]/95 shadow-md' : 'bg-transparent'"
  class="fixed top-0 left-0 w-full z-50 transition-all duration-300 ease-in-out"
>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">

      <!-- Logo -->
      <a href="{{ route('web.home') }}" class="flex items-center flex-shrink-0">
        <img src="{{ asset('assets/website/img/logo.png') }}" alt="Logo" class="h-15 w-auto">
      </a>

      <!-- Desktop Menu (center) -->
      <nav class="hidden md:flex flex-1 justify-center space-x-8 text-white font-semibold">
        <a href="{{ route('web.home') }}" class="hover:text-orange-300 transition">Beranda</a>

        <!-- Dropdown -->
        <div class="relative" @mouseenter="dropdown = true" @mouseleave="dropdown = false">
          <button class="flex items-center hover:text-orange-300 transition">
            Daftar Layanan
            <svg class="ml-1 w-4 h-4 transform transition-transform" :class="{ 'rotate-180': dropdown }"
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>

          <div
            x-show="dropdown"
            x-transition
            class="absolute top-full mt-2 bg-white rounded-xl shadow-lg py-2 w-48 text-gray-700"
            @click.away="dropdown = false"
          >
          @foreach($services as $service)
            <a href="{{ route('web.service.detail', $service->slug) }}" class="block px-4 py-2 hover:bg-gray-100">{{$service->name}}</a>
            @endforeach
          </div>
        </div>

        <a href="{{ route('web.portfolios') }}" class="hover:text-orange-300 transition">Portfolio</a>
        <a href="{{ route('web.howtoorder') }}" class="hover:text-orange-300 transition">Cara Order</a>
        <a href="{{route('web.articles')}}" class="hover:text-orange-300 transition">Artikel</a>
      </nav>

      <!-- Tombol Pesan Sekarang -->
      <div class="hidden md:flex">
        <a href="https://wa.me/{{$contacts->phone}}?text=Halo%20Liradigi%2C%20saya%20tertarik%20untuk%20membuat%20website.%20Bisa%20minta%20informasi%20lebih%20lanjut%3F" target="_blank"
            class="relative px-5 py-2.5 bg-white text-[#136ad5] rounded-xl font-semibold shadow flex items-center justify-center overflow-hidden transition-all duration-300 group hover:bg-yellow-500 hover:text-white">

            <!-- Teks normal -->
            <span class="transition-all duration-300 opacity-100 group-hover:opacity-0 transform group-hover:-translate-y-2">
            Pesan Sekarang
            </span>

            <!-- Icon WhatsApp -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
            class="absolute w-7 h-7 opacity-0 transform translate-y-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0 fill-white">
            <path
                d="M380.9 97.1C339 55.1 283.2 32 223.9 32 103.5 32 8 127.5 8 248c0 43.9 11.5 86.2 33.5 123.4L0 480l112.9-41.2c35.3 19.3 74.6 29.4 114.9 29.4h.1c120.4 0 215.9-95.5 215.9-216 0-59.3-23.1-115.1-65-157.1zM223.9 438.6c-36.2 0-71.7-9.7-102.6-28.1l-7.3-4.3-66.9 24.4 22.4-68.9-4.8-7.1c-20.6-30.5-31.4-66.1-31.4-102.6 0-101.6 82.7-184.3 184.6-184.3 49.3 0 95.6 19.2 130.4 54 34.8 34.8 54 81.1 54 130.4 0 101.8-82.7 184.5-184.4 184.5zm101.5-138.4c-5.6-2.8-33.1-16.3-38.2-18.1-5.1-1.9-8.8-2.8-12.5 2.8s-14.3 18.1-17.5 21.8-6.5 4.2-12.1 1.4-23.6-8.7-45-27.7c-16.6-14.8-27.8-33.1-31.1-38.7s-.3-8.6 2.5-11.4c2.6-2.6 5.6-6.6 8.4-9.9 2.8-3.3 3.7-5.6 5.6-9.3 1.9-3.7.9-7-0.5-9.8s-12.5-30-17.1-41.1c-4.5-10.8-9.1-9.4-12.5-9.6-3.2-.2-7-.2-10.7-.2s-9.8 1.4-15 7c-5.1 5.6-19.6 19.1-19.6 46.6s20.1 54 22.9 57.7c2.8 3.7 39.6 60.5 96.1 84.8 13.4 5.8 23.8 9.3 31.9 11.9 13.4 4.3 25.6 3.7 35.2 2.2 10.7-1.6 33.1-13.5 37.8-26.6s4.7-24.3 3.3-26.6c-1.3-2.3-5.1-3.7-10.7-6.6z" />
            </svg>
        </a>
        </div>


      <!-- Mobile menu button -->
      <button @click="open = !open" class="md:hidden text-white focus:outline-none">
        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div x-show="open" x-transition class="md:hidden bg-gradient-to-br from-blue-600 via-blue-400 to-blue-100 text-white px-6 py-4 space-y-3 font-medium">
    <a href="{{ route('web.home') }}" class="block hover:text-gray-200">Beranda</a>
    <div>
      <button @click="dropdown = !dropdown" class="w-full flex justify-between items-center hover:text-gray-200">
        Paket Website
        <svg class="ml-1 w-4 h-4 transform transition-transform" :class="{ 'rotate-180': dropdown }"
          xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 9l-7 7-7-7" />
        </svg>
      </button>
      <div x-show="dropdown" x-transition class="mt-2 space-y-2 pl-4 text-sm">
        @foreach($services as $service)
        <a href="{{ route('web.service.detail', $service->slug) }}" class="block hover:text-gray-300">{{$service->name}}</a>
        @endforeach
      </div>
    </div>
    <a href="{{ route('web.portfolios') }}" class="block hover:text-gray-200">Portfolio</a>
    <a href="{{ route('web.howtoorder') }}" class="block hover:text-gray-200">Cara Order</a>

    <!-- Tombol Pesan Sekarang (mobile) -->
    <div class="pt-2 border-t border-white/30">
      <a href="{{ url('/cara-order') }}"
        class="block text-center px-5 py-2.5 bg-white text-[#136ad5] rounded-xl font-semibold shadow hover:bg-yellow-500 hover:text-white transition">
        Pesan Sekarang
      </a>
    </div>
  </div>
</header>
