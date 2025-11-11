<header
  x-data="{ open: false, scrolled: false, dropdown: false }"
  x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 50)"
  :class="scrolled ? 'bg-[#136ad5]/95 shadow-md' : 'bg-transparent'"
  class="fixed top-0 left-0 w-full z-50 transition-all duration-300 ease-in-out"
>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">

      <!-- Logo -->
      <a href="{{ url('/') }}" class="flex items-center flex-shrink-0">
        <img src="{{ asset('assets/website/img/logo.png') }}" alt="Logo" class="h-15 w-auto">
      </a>

      <!-- Desktop Menu (center) -->
      <nav class="hidden md:flex flex-1 justify-center space-x-8 text-white font-semibold">
        <a href="{{ url('/') }}" class="hover:text-orange-300 transition">Beranda</a>

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
        <a href="{{ url('/cara-order') }}"
          class="px-5 py-2.5 bg-white text-[#136ad5] rounded-xl font-semibold shadow hover:bg-yellow-500 hover:text-white transition">
          Pesan Sekarang
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
    <a href="{{ url('/') }}" class="block hover:text-gray-200">Beranda</a>
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
        <a href="{{ url('/paket/basic') }}" class="block hover:text-gray-300">Paket Basic</a>
        <a href="{{ url('/paket/professional') }}" class="block hover:text-gray-300">Paket Professional</a>
        <a href="{{ url('/paket/custom') }}" class="block hover:text-gray-300">Paket Custom</a>
      </div>
    </div>
    <a href="{{ url('/portfolio') }}" class="block hover:text-gray-200">Portfolio</a>
    <a href="{{ url('/cara-order') }}" class="block hover:text-gray-200">Cara Order</a>

    <!-- Tombol Pesan Sekarang (mobile) -->
    <div class="pt-2 border-t border-white/30">
      <a href="{{ url('/cara-order') }}"
        class="block text-center px-5 py-2.5 bg-white text-[#136ad5] rounded-xl font-semibold shadow hover:bg-yellow-500 hover:text-white transition">
        Pesan Sekarang
      </a>
    </div>
  </div>
</header>
