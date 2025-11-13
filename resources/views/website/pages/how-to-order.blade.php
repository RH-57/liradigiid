<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{asset('assets/website/img/favicon.ico')}}" type="image/x-icon">
  <title>Cara Order | Liradigi</title>
  <meta name="description" content="Panduan lengkap cara order pembuatan website profesional di Liradigi, mulai dari konsultasi hingga website siap online.">

  <!-- Canonical -->
  <link rel="canonical" href="{{ url()->current() }}">

  <!-- Open Graph -->
  <meta property="og:title" content="Cara Order Website | Liradigi">
  <meta property="og:description" content="Ikuti 6 langkah mudah untuk memesan layanan pembuatan website profesional di Liradigi.">
  <meta property="og:type" content="article">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:image" content="{{ asset('assets/img/og/cara-order.jpg') }}">

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Cara Order Website | Liradigi">
  <meta name="twitter:description" content="Langkah-langkah order layanan pembuatan website di Liradigi.">
  <meta name="twitter:image" content="{{ asset('assets/img/og/cara-order.jpg') }}">

  @include('website.components.google-tag-header')

  <!-- Schema.org JSON-LD -->
  @php
    $jsonLd = [
      "@context" => "https://schema.org",
      "@type" => "HowTo",
      "name" => "Cara Order Website di Liradigi",
      "description" => "Panduan langkah demi langkah untuk memesan layanan pembuatan website profesional di Liradigi.",
      "image" => asset('assets/img/og/cara-order.jpg'),
      "totalTime" => "P2D",
      "supply" => [],
      "tool" => [],
      "step" => [
        [
          "@type" => "HowToStep",
          "name" => "Konsultasi",
          "text" => "Diskusikan kebutuhan website melalui WhatsApp atau form kontak.",
          "url" => url()->current() . "#step1"
        ],
        [
          "@type" => "HowToStep",
          "name" => "Pilih Paket",
          "text" => "Pilih paket website yang sesuai dengan anggaran Anda.",
          "url" => url()->current() . "#step2"
        ],
        [
          "@type" => "HowToStep",
          "name" => "Pembayaran DP",
          "text" => "Lakukan pembayaran DP untuk memulai proses pembuatan.",
          "url" => url()->current() . "#step3"
        ],
        [
          "@type" => "HowToStep",
          "name" => "Pengerjaan Website",
          "text" => "Tim kami mulai mengerjakan desain dan struktur website Anda.",
          "url" => url()->current() . "#step4"
        ],
        [
          "@type" => "HowToStep",
          "name" => "Review & Revisi",
          "text" => "Anda dapat melakukan review dan memberikan revisi sebelum finalisasi.",
          "url" => url()->current() . "#step5"
        ],
        [
          "@type" => "HowToStep",
          "name" => "Website Online",
          "text" => "Website dipublikasikan dan siap digunakan.",
          "url" => url()->current() . "#step6"
        ]
      ],
      "publisher" => [
        "@type" => "Organization",
        "name" => "Liradigi",
        "url" => url('/'),
        "logo" => [
          "@type" => "ImageObject",
          "url" => asset('assets/img/logo.png')
        ]
      ]
    ];
  @endphp

  <script type="application/ld+json">
    {!! json_encode($jsonLd, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) !!}
  </script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <!--@vite(['resources/css/app.css', 'resources/js/app.js'])-->
    <link rel="stylesheet" href="{{ asset('build/assets/app-DKXroJdo.css') }}">
</head>

<body class="bg-gray-50">
  @include('website.layouts.header')

  <!-- HERO SECTION -->
  <section class="relative min-h-[40vh] flex items-center justify-center bg-gradient-to-br from-blue-600 to-blue-400 pt-28 md:pt-16 overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/triangular.png')] opacity-25"></div>
    <div class="relative text-center text-white px-6" data-aos="fade-down">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Cara Order Layanan</h1>
      <p class="text-blue-100 max-w-2xl mx-auto">
        Ikuti langkah-langkah mudah berikut untuk memulai pembuatan website profesional bersama kami.
      </p>
    </div>
  </section>

  <!-- LANGKAH ORDER -->
  <section class="py-20 bg-white relative">
    <div class="max-w-6xl mx-auto px-6 lg:px-8">
      <h2 class="text-3xl md:text-4xl font-bold text-[#136ad5] text-center mb-14" data-aos="fade-up">
        Langkah-Langkah Order
      </h2>

      <div class="grid md:grid-cols-3 gap-8">
        <!-- Step 1 -->
        <div class="bg-gradient-to-b from-blue-50 to-white p-8 rounded-2xl shadow hover:shadow-xl transition" data-aos="zoom-in" data-aos-delay="100">
          <div class="w-16 h-16 flex items-center justify-center bg-[#136ad5] text-white text-2xl rounded-full mb-6">
            <i class="fa-solid fa-comments"></i>
          </div>
          <h3 class="text-xl font-semibold text-gray-800 mb-2">1. Konsultasi</h3>
          <p class="text-gray-600">Diskusikan kebutuhan website Anda melalui WhatsApp atau form kontak kami.</p>
        </div>

        <!-- Step 2 -->
        <div class="bg-gradient-to-b from-blue-50 to-white p-8 rounded-2xl shadow hover:shadow-xl transition" data-aos="zoom-in" data-aos-delay="200">
          <div class="w-16 h-16 flex items-center justify-center bg-[#136ad5] text-white text-2xl rounded-full mb-6">
            <i class="fa-solid fa-list-check"></i>
          </div>
          <h3 class="text-xl font-semibold text-gray-800 mb-2">2. Pilih Paket</h3>
          <p class="text-gray-600">Pilih paket website yang sesuai dengan kebutuhan dan anggaran bisnis Anda.</p>
        </div>

        <!-- Step 3 -->
        <div class="bg-gradient-to-b from-blue-50 to-white p-8 rounded-2xl shadow hover:shadow-xl transition" data-aos="zoom-in" data-aos-delay="300">
          <div class="w-16 h-16 flex items-center justify-center bg-[#136ad5] text-white text-2xl rounded-full mb-6">
            <i class="fa-solid fa-credit-card"></i>
          </div>
          <h3 class="text-xl font-semibold text-gray-800 mb-2">3. Pembayaran</h3>
          <p class="text-gray-600">Lakukan pembayaran DP sesuai kesepakatan untuk memulai pengerjaan.</p>
        </div>
      </div>

      <!-- Step 4-6 -->
      <div class="grid md:grid-cols-3 gap-8 mt-10">
        <div class="bg-gradient-to-b from-blue-50 to-white p-8 rounded-2xl shadow hover:shadow-xl transition" data-aos="zoom-in" data-aos-delay="400">
          <div class="w-16 h-16 flex items-center justify-center bg-[#136ad5] text-white text-2xl rounded-full mb-6">
            <i class="fa-solid fa-laptop-code"></i>
          </div>
          <h3 class="text-xl font-semibold text-gray-800 mb-2">4. Pengerjaan Website</h3>
          <p class="text-gray-600">Tim kami mulai membuat website sesuai desain dan kebutuhan Anda.</p>
        </div>

        <div class="bg-gradient-to-b from-blue-50 to-white p-8 rounded-2xl shadow hover:shadow-xl transition" data-aos="zoom-in" data-aos-delay="500">
          <div class="w-16 h-16 flex items-center justify-center bg-[#136ad5] text-white text-2xl rounded-full mb-6">
            <i class="fa-solid fa-eye"></i>
          </div>
          <h3 class="text-xl font-semibold text-gray-800 mb-2">5. Review & Revisi</h3>
          <p class="text-gray-600">Anda dapat mereview hasil dan memberikan revisi sebelum website final.</p>
        </div>

        <div class="bg-gradient-to-b from-blue-50 to-white p-8 rounded-2xl shadow hover:shadow-xl transition" data-aos="zoom-in" data-aos-delay="600">
          <div class="w-16 h-16 flex items-center justify-center bg-[#136ad5] text-white text-2xl rounded-full mb-6">
            <i class="fa-solid fa-rocket"></i>
          </div>
          <h3 class="text-xl font-semibold text-gray-800 mb-2">6. Website Online!</h3>
          <p class="text-gray-600">Website Anda siap dipublikasikan dan digunakan untuk meningkatkan bisnis Anda.</p>
        </div>
      </div>
    </div>
  </section>

  @include('website.layouts.whatsapp')
  @include('website.layouts.footer')
  @include('website.components.google-tag-body')

  <script src="{{ asset('build/assets/app-BYk74Vyi.js') }}" defer></script>
</body>
</html>
