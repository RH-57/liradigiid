<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
  <title>Panduan Cara Order Website Profesional – Liradigi</title>
  <meta name="description" content="Cara order website di Liradigi sangat mudah! Konsultasi, pilih paket, lakukan pembayaran, dan website Anda siap online dalam hitungan hari.">

  <!-- Canonical -->
  <link rel="canonical" href="{{ url()->current() }}">

  <!-- Open Graph -->
  <meta property="og:title" content="Cara Order Website | Liradigi">
  <meta property="og:description" content="Ikuti 6 langkah mudah untuk memesan layanan pembuatan website profesional di Liradigi.">
  <meta property="og:type" content="article">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:image" content="{{ asset('assets/website/img/og-liradigi.webp') }}">

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Cara Order Website | Liradigi">
  <meta name="twitter:description" content="Langkah-langkah order layanan pembuatan website di Liradigi.">
  <meta name="twitter:image" content="{{ asset('assets/website/img/og-liradigi.webp') }}">

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

  <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </noscript>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
  @include('website.layouts.header')

  <!-- HERO SECTION -->
  <section class="relative min-h-[40vh] flex items-center justify-center bg-gradient-to-br from-blue-600 to-blue-400 pt-28 md:pt-16 overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/triangular.png')] opacity-25"></div>
    <div class="relative text-center text-white px-6" data-aos="fade-down">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Cara Order Layanan</h1>
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
        Ikuti langkah-langkah mudah berikut untuk memulai membangun website profesional Anda bersama Liradigi.
    </p>
    </section>

  <!-- LANGKAH ORDER -->
  <section class="py-20 bg-white relative">
    <div class="max-w-6xl mx-auto px-6 lg:px-8">
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

  @include('website.components.cta')
  @include('website.layouts.whatsapp')
  @include('website.layouts.footer')
  @include('website.components.google-tag-body')
</body>
</html>
