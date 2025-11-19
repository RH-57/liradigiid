<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

  <title>Artikel {{ ucfirst($category) }} - Liradigi</title>

  <meta name="description" content="Kumpulan artikel kategori {{ ucfirst($category) }} dari Liradigi. Temukan insight, tips, dan panduan digital terbaru.">

  <!-- Canonical -->
  <link rel="canonical" href="{{ url()->current() }}">

  <!-- OG -->
  <meta property="og:title" content="Artikel {{ ucfirst($category) }} - Liradigi">
  <meta property="og:description" content="Baca artikel terbaik kategori {{ ucfirst($category) }} di Liradigi.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:image" content="{{ asset('assets/website/img/og-liradigi.webp') }}">

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Artikel {{ ucfirst($category) }} - Liradigi">
  <meta name="twitter:description" content="Kumpulan artikel menarik seputar {{ ucfirst($category) }}.">
  <meta name="twitter:image" content="{{ asset('assets/website/img/og-liradigi.webp') }}">

  @include('website.components.google-tag-header')

  <!-- JSON-LD -->
  @php
    $jsonLd = [
      "@context" => "https://schema.org",
      "@type" => "CollectionPage",
      "name" => "Artikel Kategori " . ucfirst($category),
      "description" => "Kumpulan artikel kategori " . ucfirst($category)." dari Liradigi.",
      "hasPart" => $articles->map(function($article) {
        return [
          "@type" => "BlogPosting",
          "headline" => $article->title,
          "image" => $article->featured_image
              ? asset('storage/'.$article->featured_image)
              : asset('assets/website/img/default-article.jpg'),
          "url" => route('web.articles.show', [$article->category, $article->slug]),
          "datePublished" =>
              $article->published_at
              ? $article->published_at->toIso8601String()
              : $article->created_at->toIso8601String(),
          "articleSection" => $article->category ?? "Artikel"
        ];
      })
    ];
  @endphp

  <script type="application/ld+json">
    {!! json_encode($jsonLd, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) !!}
  </script>

  <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"></noscript>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">

@include('website.layouts.header')

<!-- HERO SECTION -->
<section class="relative min-h-[40vh] flex items-center justify-center bg-gradient-to-br from-blue-600 to-blue-400 pt-28 md:pt-16 overflow-hidden">
  <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/triangular.png')] opacity-25"></div>
  <div class="relative text-center text-white px-6" data-aos="fade-down">
    <h1 class="text-4xl md:text-5xl font-bold mb-4">Kategori: {{ ucfirst($category) }}</h1>
    <p class="text-blue-100 max-w-2xl mx-auto">
      Temukan artikel pilihan terbaik seputar {{ ucfirst($category) }} untuk menambah wawasan dan insight Anda.
    </p>
  </div>
</section>

<!-- LIST ARTIKEL -->
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">

      @forelse($articles as $article)
      <div class="group bg-white rounded-2xl shadow-md hover:shadow-2xl transition overflow-hidden" data-aos="fade-up">
        <div class="overflow-hidden">
          <img src="{{ $article->featured_image ? asset('storage/'.$article->featured_image) : asset('assets/website/img/default-article.jpg') }}"
               alt="{{ $article->title }}"
               class="w-full h-56 object-cover transform group-hover:scale-110 transition duration-700">
        </div>
        <div class="p-6">
          <a href="{{ route('web.articles.show', [$article->category, $article->slug]) }}">
            <h3 class="text-xl font-semibold text-[#136ad5] mb-2 hover:text-yellow-500 transition">
              {{ $article->title }}
            </h3>
          </a>
          <p class="text-gray-600 text-sm mb-4 line-clamp-3">
            {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 100) }}
          </p>
          <div class="flex items-center text-sm text-gray-500 space-x-3 mb-3">
            <span><i class="fa-solid fa-calendar text-[#136ad5] mr-1"></i>
              {{ $article->published_at ? $article->published_at->translatedFormat('d M Y') : $article->created_at->translatedFormat('d M Y') }}
            </span>
          </div>
          <a href="{{ route('web.articles.show', [$article->category, $article->slug]) }}" class="text-[#00a2ff] font-medium hover:underline">
            Baca Selengkapnya →
          </a>
        </div>
      </div>
      @empty
        <p class="text-center text-gray-500 col-span-3">Belum ada artikel pada kategori ini.</p>
      @endforelse

    </div>

    <!-- PAGINATION -->
    <div class="mt-14 flex justify-center" data-aos="fade-up">
      {{ $articles->links('vendor.pagination.custom') }}
    </div>

  </div>
</section>

@include('website.layouts.footer')
@include('website.components.google-tag-body')

</body>
</html>
