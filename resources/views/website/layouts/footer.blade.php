<!-- Footer -->
<footer class="bg-gradient-to-b from-blue-800 to-blue-900 text-white pt-16 pb-8">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">

      <!-- Kolom 1: Logo dan Deskripsi -->
      <div>
        <div class="flex items-center gap-2 mb-4">
        <img src="{{ asset('assets/website/img/logo.png') }}"
            alt="Logo ProTekno.io"
            class="h-15 w-auto">
        </div>

        <p class="text-blue-100 text-sm leading-relaxed mb-4">
          Solusi digital untuk bisnis Anda — kami membangun website profesional dan cepat dengan dukungan penuh untuk kesuksesan online Anda.
        </p>
        <div class="flex space-x-3 mt-4">
            @foreach($mediasocials as $mediasocial)
          <a href="{{$mediasocial->url}}" class="bg-blue-700 hover:bg-yellow-500 transition p-2 rounded-full">
            <i class="fa-brands {{$mediasocial->icon}}"></i>
          </a>
          @endforeach
        </div>
      </div>

      <!-- Kolom 2: Menu Cepat -->
      <div>
        <h4 class="text-lg font-semibold mb-4 text-white">Menu Cepat</h4>
        <ul class="space-y-2 text-blue-100">
          <li><a href="{{ url('/') }}" class="hover:text-yellow-400 transition">Beranda</a></li>
          <li><a href="{{ route('web.portfolios') }}" class="hover:text-yellow-400 transition">Portfolio</a></li>
          <li><a href="{{route('web.howtoorder')}}" class="hover:text-yellow-400 transition">Cara Order</a></li>
          <li><a href="{{route('web.articles')}}" class="hover:text-yellow-400 transition">Artikel</a></li>
        </ul>
      </div>

      <!-- Kolom 3: Layanan -->
      <div>
        <h4 class="text-lg font-semibold mb-4 text-white">Layanan Kami</h4>
        <ul class="space-y-2 text-blue-100">
        @foreach($services as $service)
          <li><i class="fa-solid fa-circle-check mr-2 text-yellow-500"></i><a href="{{ route('web.service.detail', $service->slug) }}">{{$service->name}}</a></li>
          @endforeach
        </ul>
      </div>

      <!-- Kolom 4: Kontak -->
      <div>
        <h4 class="text-lg font-semibold mb-4 text-white">Hubungi Kami</h4>
        <ul class="space-y-3 text-blue-100 text-sm">
          <li><i class="fa-solid fa-location-dot text-yellow-500 mr-2"></i>{{$contacts->address}}</li>
          <li><i class="fa-solid fa-phone text-yellow-500 mr-2"></i>+{{$contacts->phone}}</li>
          <li><i class="fa-solid fa-envelope text-yellow-500 mr-2"></i>{{$contacts->email}}</li>
          <li class="flex items-center">
            <i class="fa-brands fa-whatsapp text-yellow-500 mr-2"></i>
            <a href="" target="_blank">Chat via WhatsApp</a>
            <span class="ml-2 bg-yellow-500/10 text-yellow-400 text-xs font-semibold px-2 py-0.5 rounded-full animate-pulse">
                Online
            </span>
            </li>

        </ul>
      </div>
    </div>

    <!-- Garis pemisah -->
    <div class="border-t border-blue-700 pt-6 text-center text-blue-200 text-sm">
      © 2025 <span class="font-semibold text-white"><a href="" class="text-white hover:text-yellow-400">Lintas Arah Digital</a></span>. Semua hak dilindungi.
    </div>
  </div>
</footer>
