<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Artikel & Insight | Liradigi</title>
  <meta name="description" content="Kumpulan artikel, tips, dan insight seputar website, digital marketing, dan teknologi terbaru.">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
  @include('website.layouts.header')

  <!-- HERO -->
  <section class="relative min-h-[40vh] flex items-center justify-center bg-gradient-to-br from-blue-600 via-blue-400 to-blue-100 pt-28 md:pt-16 overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/triangular.png')] opacity-25"></div>
    <div class="relative text-center text-white px-6" data-aos="fade-down">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Artikel & Insight</h1>
      <p class="text-blue-100 max-w-2xl mx-auto">
        Temukan inspirasi, strategi digital, dan panduan teknologi untuk membantu bisnis Anda berkembang.
      </p>
    </div>
  </section>

  <!-- SECTION ARTIKEL -->
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

      {{-- Highlight Artikel Terpopuler --}}
      @if($highlightArticle)
      <div class="mb-16" data-aos="fade-up" data-aos-delay="100">
        <div class="grid md:grid-cols-2 gap-10 items-center bg-gradient-to-b from-blue-50 to-white p-6 md:p-10 rounded-3xl shadow-lg hover:shadow-2xl transition">
          <div class="overflow-hidden rounded-2xl">
            <img src="{{ $highlightArticle->featured_image ? asset('storage/'.$highlightArticle->featured_image) : asset('assets/website/img/default-article.jpg') }}"
              alt="{{ $highlightArticle->title }}"
              class="w-full h-72 md:h-96 object-cover rounded-2xl transform hover:scale-105 transition duration-700">
          </div>
          <div class="text-left space-y-4">
            <span class="bg-[#136ad5] text-white text-xs px-3 py-1 rounded-full uppercase">
              {{ $highlightArticle->category ?? 'Artikel' }}
            </span>
            <a href="">
              <h3 class="text-2xl md:text-3xl font-bold text-gray-800 hover:text-[#136ad5] transition">
                {{ $highlightArticle->title }}
              </h3>
            </a>
            <p class="text-gray-600 text-base line-clamp-3">
              {{ $highlightArticle->excerpt ?? Str::limit(strip_tags($highlightArticle->content), 150) }}
            </p>
            <div class="flex items-center text-sm text-gray-500 space-x-4">
              <span><i class="fa-solid fa-calendar text-[#136ad5] mr-1"></i>
                {{ $highlightArticle->published_at ? $highlightArticle->published_at->translatedFormat('d M Y') : $highlightArticle->created_at->translatedFormat('d M Y') }}
              </span>
            </div>
            <a href="{{ route('web.articles.show', [$highlightArticle->category, $highlightArticle->slug]) }}" class="inline-block mt-4 bg-[#136ad5] text-white font-semibold px-5 py-2 rounded-lg hover:bg-yellow-500 transition">
              Baca Selengkapnya
            </a>
          </div>
        </div>
      </div>
      @endif

      {{-- Artikel Lainnya --}}
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">
        @forelse($articles as $article)
        <div class="group bg-white rounded-2xl shadow-md hover:shadow-2xl transition overflow-hidden" data-aos="fade-up">
          <div class="overflow-hidden">
            <img src="{{ $article->featured_image ? asset('storage/'.$article->featured_image) : asset('assets/website/img/default-article.jpg') }}"
              alt="{{ $article->title }}"
              class="w-full h-56 object-cover transform group-hover:scale-110 transition duration-700">
          </div>
          <div class="p-6">
            <a href="">
              <h3 class="text-xl font-semibold text-[#136ad5] mb-2">{{ $article->title }}</h3>
            </a>
            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
              {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 100) }}
            </p>
            <div class="flex items-center text-sm text-gray-500 space-x-3 mb-3">
              <span><i class="fa-solid fa-calendar text-[#136ad5] mr-1"></i>
                {{ $article->published_at ? $article->published_at->translatedFormat('d M Y') : $article->created_at->translatedFormat('d M Y') }}
              </span>
            </div>
            <a href="{{ route('web.articles.show', [$article->category, $article->slug]) }}" class="text-[#00a2ff] font-medium hover:underline">Baca Selengkapnya →</a>
          </div>
        </div>
        @empty
          <p class="text-center text-gray-500 col-span-3">Belum ada artikel yang tersedia.</p>
        @endforelse
      </div>

      {{-- Pagination --}}
      <div class="mt-14 flex justify-center" data-aos="fade-up">
        {{ $articles->links('pagination::tailwind') }}
      </div>
    </div>
  </section>

  @include('website.layouts.footer')
</body>
</html>
