<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio | Liradigi</title>
  <meta name="description" content="Lihat berbagai project website yang telah kami selesaikan di Liradigi.">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
  @include('website.layouts.header')

  <!-- HERO SECTION -->
  <section class="relative min-h-[40vh] flex items-center justify-center bg-gradient-to-br from-blue-600 via-blue-400 to-blue-100 pt-28 md:pt-16 overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/triangular.png')] opacity-25"></div>
    <div class="relative text-center text-white px-6" data-aos="fade-down">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Portfolio Kami</h1>
      <p class="text-blue-100 max-w-2xl mx-auto">
        Beberapa project unggulan yang telah kami kerjakan untuk berbagai klien dari berbagai industri.
      </p>
    </div>
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
            <a href="{{$portfolio->url}}"><p class="text-gray-600 text-sm">{{$portfolio->url}}</p></a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  @include('website.components.cta')

  @include('website.layouts.footer')
</body>
</html>
