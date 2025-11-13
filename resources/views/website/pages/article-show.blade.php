<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{asset('assets/website/img/favicon.ico')}}" type="image/x-icon">
  <title>{{ $article->meta_title ?? $article->title }} | Liradigi Digital Agency</title>

  <!-- Meta SEO -->
  <meta name="description" content="{{ $article->meta_description ?? Str::limit(strip_tags($article->content), 160) }}">
  <meta name="keywords" content="{{ $article->meta_keyword }}">
  <link rel="canonical" href="{{ $article->canonical_url ?? url()->current() }}">
  <meta name="robots" content="{{ $article->robots ?? 'index, follow' }}">

  <!-- Open Graph / Facebook -->
  <meta property="og:title" content="{{ $article->og_title ?? $article->title }}">
  <meta property="og:description" content="{{ $article->og_description ?? Str::limit(strip_tags($article->content), 150) }}">
  <meta property="og:image" content="{{ $article->meta_image ? asset('storage/'.$article->meta_image) : asset('assets/website/img/default-article.jpg') }}">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:type" content="article">
  <meta property="og:site_name" content="Liradigi">

  <!-- Open Graph Article Metadata -->
  <meta property="article:published_time" content="{{ optional($article->published_at ?? $article->created_at)->toIso8601String() }}">
  <meta property="article:modified_time" content="{{ optional($article->updated_at)->toIso8601String() }}">
  <meta property="article:author" content="{{ $article->user->name ?? 'Admin Liradigi' }}">
  <meta property="article:section" content="{{ $article->category }}">
  <meta property="article:tag" content="{{ $article->meta_keyword }}">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="{{ $article->meta_title ?? $article->title }}">
  <meta name="twitter:description" content="{{ $article->meta_description ?? Str::limit(strip_tags($article->content), 150) }}">
  <meta name="twitter:image" content="{{ $article->meta_image ? asset('storage/'.$article->meta_image) : asset('assets/website/img/default-article.jpg') }}">
  <meta name="twitter:site" content="@liradigi">
    <meta name="twitter:creator" content="@liradigi">

  @include('website.components.google-tag-header')

  {{-- masukkan di <head> --}}
    @php
    $schema = [
    '@context' => 'https://schema.org',
    '@type' => 'Article',

    'mainEntityOfPage' => [
        '@type' => 'WebPage',
        '@id' => url()->current(),
    ],
    'url' => url()->current(),

    'headline' => $article->meta_title ?? $article->title,
    'description' => strip_tags(Str::limit($article->meta_description ?? $article->content, 160)),

    'image' => [
        $article->meta_image
        ? asset('storage/'.$article->meta_image)
        : asset('assets/website/img/default-article.jpg')
    ],

    'datePublished' => ($article->published_at ?? $article->created_at)->toIso8601String(),
    'dateModified' => ($article->updated_at ?? $article->published_at ?? $article->created_at)->toIso8601String(),

    'author' => [
        '@type' => 'Person',
        'name' => $article->user->name ?? 'Admin Liradigi',
    ],

    'publisher' => [
        '@type' => 'Organization',
        'name' => 'Liradigi',
        'url' => url('/'),
        'logo' => [
        '@type' => 'ImageObject',
        'url' => asset('assets/website/img/logo.png'),
        'width' => 600,
        'height' => 60
        ],
    ],

    'articleSection' => $article->category ?? 'Artikel',
    'keywords' => $article->meta_keyword,
    'interactionStatistic' => [
        '@type' => 'InteractionCounter',
        'interactionType' => [
        '@type' => 'http://schema.org/ViewAction'
        ],
        'userInteractionCount' => (int) $article->views,
    ],
    'isAccessibleForFree' => true,
    'wordCount' => str_word_count(strip_tags($article->content)),
    ];
    @endphp

    <script type="application/ld+json">
    {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
   <!--@vite(['resources/css/app.css', 'resources/js/app.js'])-->
    <link rel="stylesheet" href="{{ asset('build/assets/app-DKXroJdo.css') }}">
</head>

<body class="bg-gray-50">
  @include('website.layouts.header')

  <!-- HERO / COVER -->
  <section class="relative min-h-[50vh] flex items-center justify-center bg-gradient-to-br from-blue-600 to-blue-400 pt-28 md:pt-16 overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/triangular.png')] opacity-25"></div>

    <div class="relative text-center text-white px-6" data-aos="fade-down">
      <h1 class="text-4xl md:text-5xl font-bold mt-4 mb-3 leading-tight max-w-3xl mx-auto">{{ $article->title }}</h1>
      <div class="flex justify-center items-center text-blue-100 text-sm space-x-3">
        <span><i class="fa-solid fa-tags text-yellow-300 mr-1"></i>
          {{ $article->category }}
        </span>
        <span><i class="fa-solid fa-calendar text-yellow-300 mr-1"></i>
          {{ $article->published_at ? $article->published_at->translatedFormat('d M Y') : $article->created_at->translatedFormat('d M Y') }}
        </span>
        <span><i class="fa-solid fa-eye text-yellow-300 mr-1"></i> {{ $article->views }} kali dibaca</span>
      </div>
    </div>
  </section>

  <!-- ISI ARTIKEL -->
  <section class="py-20">
    <div class="max-w-5xl mx-auto px-6 lg:px-8 bg-white shadow-lg rounded-3xl p-8 md:p-12 relative z-10" data-aos="fade-up">

      {{-- Gambar Utama --}}
      @if($article->featured_image)
      <div class="mb-10 overflow-hidden rounded-2xl shadow-md">
        <img src="{{ asset('storage/'.$article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-auto object-cover">
      </div>
      @endif

      {{-- Konten --}}
      <article class="prose prose-lg max-w-none text-gray-800">
        {!! $article->content !!}
      </article>

      {{-- Info Penulis & Share --}}
      <div class="mt-12 border-t pt-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
        <div class="flex items-center space-x-3">
          <div class="bg-[#136ad5] text-white w-12 h-12 flex items-center justify-center rounded-full font-bold">
            {{ strtoupper(substr($article->user->name ?? 'L', 0, 1)) }}
          </div>
          <div>
            <p class="font-semibold text-gray-700">Ditulis oleh</p>
            <p class="text-[#136ad5] font-bold">{{ $article->user->name ?? 'Admin Liradigi' }}</p>
          </div>
        </div>

        {{-- Tombol Share --}}
        <div class="flex items-center space-x-4">
          <span class="text-gray-600 font-medium">Bagikan:</span>
          <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="text-blue-600 hover:text-blue-800">
            <i class="fab fa-facebook-f text-xl"></i>
          </a>
          <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($article->title) }}" target="_blank" class="text-sky-500 hover:text-sky-700">
            <i class="fab fa-x-twitter text-xl"></i>
          </a>
          <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ urlencode($article->title) }}" target="_blank" class="text-blue-700 hover:text-blue-900">
            <i class="fab fa-linkedin-in text-xl"></i>
          </a>
          <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . request()->fullUrl()) }}" target="_blank" class="text-green-600 hover:text-green-800">
            <i class="fab fa-whatsapp text-xl"></i>
          </a>
          <div class="relative">
            <button onclick="copyLink(this)"
                    class="text-gray-600 hover:text-gray-800 focus:outline-none relative"
                    title="Salin tautan">
                <i class="fas fa-link text-xl"></i>
            </button>

            {{-- Popup --}}
            <div id="copy-popup"
                class="absolute left-1/2 -translate-x-1/2 -top-8
                        bg-gray-800 text-white text-sm rounded-md px-2 py-1
                        pointer-events-none z-50"
                style="opacity: 0; transform: scale(0.9); transition: all 0.2s ease-out;">
            Tautan disalin!
            </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ARTIKEL TERKAIT -->
  @if($relatedArticles->count())
  <section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6 lg:px-8">
      <h2 class="text-2xl font-bold text-gray-800 mb-10 text-center">Artikel Terkait</h2>
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">
        @foreach($relatedArticles as $related)
        <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition overflow-hidden">
          <div class="overflow-hidden">
            <img src="{{ $related->featured_image ? asset('storage/'.$related->featured_image) : asset('assets/website/img/default-article.jpg') }}"
              alt="{{ $related->title }}"
              class="w-full h-52 object-cover transform group-hover:scale-110 transition duration-700">
          </div>
          <div class="p-6">
            <a href="{{ route('web.articles.show', [$related->category, $related->slug]) }}">
              <h3 class="text-lg font-semibold text-[#136ad5] mb-2">{{ $related->title }}</h3>
            </a>
            <p class="text-gray-600 text-sm line-clamp-3">{{ $related->excerpt ?? Str::limit(strip_tags($related->content), 100) }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  @endif

  @include('website.layouts.footer')

  <script src="{{ asset('build/assets/app-BYk74Vyi.js') }}" defer></script>
  <script>
        function copyLink(btn) {
        const url = "{{ request()->fullUrl() }}";
        const popup = btn.parentElement.querySelector('#copy-popup');

        navigator.clipboard.writeText(url).then(() => {
            popup.style.opacity = "1";
            popup.style.transform = "scale(1)";

            setTimeout(() => {
            popup.style.opacity = "0";
            popup.style.transform = "scale(0.9)";
            }, 2000);
        });
        }
        </script>

</body>
</html>
