<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
  <title>Portfolio Jasa Pembuatan Website Profesional - Liradigi</title>
  <meta name="description" content="Lihat hasil pembuatan website modern, cepat, mobile friendly, dan SEO-ready untuk berbagai bisnis. Klik untuk melihat contoh website klien Liradigi.">

  <!-- Canonical -->
  <link rel="canonical" href="{{ url()->current() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <!-- Open Graph -->
  <meta property="og:title" content="Portfolio Website | Liradigi">
  <meta property="og:description" content="Lihat berbagai project website terbaik yang telah kami kerjakan untuk berbagai klien.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:image" content="{{ asset('assets/website/img/og-liradigi.webp') }}">

   <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Portfolio Website | Liradigi">
  <meta name="twitter:description" content="Lihat berbagai project website terbaik yang telah kami selesaikan.">
  <meta name="twitter:image" content="{{ asset('assets/website/img/og-liradigi.webp') }}">

   @php
    $jsonLd = [
        "@context" => "https://schema.org",
        "@type" => "CollectionPage",
        "name" => "Portfolio Website Liradigi",
        "description" => "Kumpulan project website profesional dari Liradigi.",
        "url" => url()->current(),
        "publisher" => [
        "@type" => "Organization",
        "name" => "Liradigi",
        "url" => url('/'),
        "logo" => [
            "@type" => "ImageObject",
            "url" => asset('assets/img/logo.png')
        ]
        ],
        "mainEntity" => $portfolios->map(function($item) {
        return [
            "@type" => "CreativeWork",
            "name" => $item->name,
            "image" => asset('storage/' . $item->image),
            "url" => $item->url
        ];
        })
    ];
    @endphp
    <script type="application/ld+json">
    {!! json_encode($jsonLd, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) !!}
    </script>

    @include('website.components.google-tag-header')
    @include('website.components.google-tag-footer')

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
  @include('website.layouts.header')

  <!-- HERO SECTION -->
<!-- HERO SECTION -->
  <section class="relative min-h-[40vh] flex items-center justify-center bg-gradient-to-br from-blue-600 to-blue-400 pt-28 md:pt-16 overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/triangular.png')] opacity-25"></div>
    <div class="relative text-center text-white px-6" data-aos="fade-down">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Portfolio Kami</h1>
<!-- Breadcrumb -->
        <nav class="text-sm flex justify-center" aria-label="Breadcrumb">
            <ol class="flex items-center gap-2 text-white/80">
                <li>
                    <a href="{{ route('web.home') }}" class="hover:text-yellow-500 transition flex items-center">
                        <i class="fa fa-home mr-1"></i> Home
                    </a>
                </li>

                <li><span class="opacity-70">/</span></li>

                <li class="font-semibold text-white">
                    Cara Order
                </li>
            </ol>
        </nav>
    </div>
  </section>



    <section class="px-6 max-w-4xl mx-auto mt-10 text-center">
    <p class="text-gray-600 mb-8">
        Liradigi telah mengerjakan berbagai jenis website untuk beragam industri,
        seperti company profile, travel, kontraktor, UMKM, dan lainnya.
        Semua website dibangun dengan desain modern, cepat, aman, dan mobile friendly.
    </p>
    </section>

  <!-- PORTFOLIO GRID -->
  <section class="py-20 bg-white relative">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">
        @foreach($portfolios as $portfolio)
        <!-- Project Card -->
        <div class="group bg-gradient-to-b from-blue-50 to-white rounded-2xl shadow-md hover:shadow-2xl transition-all overflow-hidden" data-aos="zoom-in" data-aos-delay="100">
          <div class="overflow-hidden">
            <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{$portfolio->name}}"
              class="w-full h-56 object-cover transform group-hover:scale-110 transition duration-700">
          </div>
          <div class="p-6 text-center">
            <h3 class="text-xl font-semibold text-[#136ad5] mb-1">{{$portfolio->name}}</h3>
            <a href="{{$portfolio->url}}" target="_blank"><p class="text-gray-600 text-sm">{{$portfolio->url}}</p></a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  @include('website.components.cta')
@include('website.layouts.whatsapp')
  @include('website.layouts.footer')
  @include('website.components.google-tag-body')
</body>
</html>
