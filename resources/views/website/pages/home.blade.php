<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('assets/website/img/favicon.ico')}}" type="image/x-icon">
    <title>Liradigi - Jasa Pembuatan Website Profesional & Cepat untuk Bisnis Anda</title>
    <meta name="description" content="Liradigi adalah digital agency yang membantu bisnis Anda tampil unggul di dunia digital melalui pembuatan website profesional, cepat, dan SEO-friendly.">
    <meta name="keywords" content="Liradigi, jasa pembuatan website, digital agency, web design, website UMKM, web instansi, jasa buat website murah, SEO website">
    <meta name="author" content="Liradigi Digital Agency">

    <!-- ✅ Open Graph / Facebook -->
    <meta property="og:title" content="Liradigi - Jasa Pembuatan Website Profesional & Cepat untuk Bisnis Anda">
    <meta property="og:description" content="Kami bantu Anda membangun website profesional, cepat, dan modern agar bisnis tampil unggul di dunia digital.">
    <meta property="og:image" content="{{ asset('assets/website/img/og-liradigi.webp') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Liradigi">

    <!-- ✅ Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Liradigi - Partner Digital untuk Bisnis Anda">
    <meta name="twitter:description" content="Digital agency spesialis pembuatan website profesional dan cepat.">
    <meta name="twitter:image" content="{{ asset('assets/website/img/og-liradigi.webp') }}">

    <!-- ✅ Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/website/img/logo.png') }}">

    <!-- ✅ Canonical -->
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Structured Data --}}
    @include('website.components.structured-data')

    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">

    @include('website.components.google-tag-header')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    @include('website.layouts.header')
    <section class="relative min-h-screen flex items-center bg-gradient-to-br from-blue-600 to-blue-400 pt-28 md:pt-16 pb-10 overflow-hidden">

        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/triangular.png')] opacity-25"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-8 items-center relative z-10">

            <!-- Left: Text -->
            <div class="space-y-4 max-w-xl text-white text-center md:text-left" data-aos="fade-right">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold leading-snug">
                    Partner Digital Untuk Bisnis Anda
                </h1>
                <p class="text-blue-100 text-base md:text-lg">
                    Kami membantu membangun website profesional dan cepat agar bisnis Anda tampil unggul di dunia digital.
                </p>

                <div class="flex flex-wrap justify-center md:justify-start gap-3">
                    <a href="{{ url('/cara-order') }}" class="px-5 py-2.5 bg-white text-[#136ad5] rounded-xl font-semibold shadow hover:bg-yellow-500 hover:text-white transition">
                        Diskusi Sekarang
                    </a>
                    <a href="{{ url('/portfolio') }}" class="px-5 py-2.5 border-2 border-white text-white rounded-xl font-medium hover:bg-white hover:text-[#136ad5] transition">
                        Lihat Portfolio
                    </a>
                </div>
            </div>

            <!-- Right: Floating Image -->
            <div class="flex justify-center md:justify-end mt-10 md:mt-0" data-aos="fade-left">
                <img
                    src="{{ asset('assets/website/img/hero.png') }}"
                    alt="Web Development Illustration"
                    class="w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg rounded-2xl floating"
                >
            </div>
        </div>
    </section>

    <!-- Section: Kenapa Memilih Kami -->
    <section class="py-20 bg-white" id="kenapa-memilih-kami">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">

            <!-- Heading -->
            <div class="mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-[#136ad5] mb-4">
                    Kenapa Memilih Kami?
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Kami berkomitmen memberikan solusi digital terbaik agar bisnis Anda dapat berkembang dengan cepat, efisien, dan profesional.
                </p>
            </div>

            <!-- Cards -->
            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">

                <!-- Card 1 -->
                <div class="p-6 sm:p-8 rounded-2xl shadow-md hover:shadow-xl transition bg-gradient-to-b from-blue-300 to-blue-50"
                    data-aos="zoom-in" data-aos-delay="100">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 mx-auto mb-5 flex items-center justify-center bg-gradient-to-br from-blue-600 to-blue-400 rounded-full">
                        <i class="fa-solid fa-palette text-white text-2xl sm:text-3xl"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">Desain Profesional</h3>
                    <p class="text-gray-600 text-sm sm:text-base">
                        Website dengan tampilan modern dan pengalaman pengguna optimal.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="p-6 sm:p-8 rounded-2xl shadow-md hover:shadow-xl transition bg-gradient-to-b from-blue-300 to-blue-50"
                    data-aos="zoom-in" data-aos-delay="200">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 mx-auto mb-5 flex items-center justify-center bg-gradient-to-br from-blue-600 to-blue-400 rounded-full">
                        <i class="fa-solid fa-bolt text-white text-2xl sm:text-3xl"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">Cepat & Responsif</h3>
                    <p class="text-gray-600 text-sm sm:text-base">
                        Optimasi performa untuk kecepatan tinggi di semua perangkat.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="p-6 sm:p-8 rounded-2xl shadow-md hover:shadow-xl transition bg-gradient-to-b from-blue-300 to-blue-50"
                    data-aos="zoom-in" data-aos-delay="300">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 mx-auto mb-5 flex items-center justify-center bg-gradient-to-br from-blue-600 to-blue-400 rounded-full">
                        <i class="fa-solid fa-headset text-white text-2xl sm:text-3xl"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">Support Penuh</h3>
                    <p class="text-gray-600 text-sm sm:text-base">
                        Dukungan teknis & pemeliharaan berkelanjutan setelah website online.
                    </p>
                </div>

                <!-- Card 4 -->
                <div class="p-6 sm:p-8 rounded-2xl shadow-md hover:shadow-xl transition bg-gradient-to-b from-blue-300 to-blue-50"
                    data-aos="zoom-in" data-aos-delay="400">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 mx-auto mb-5 flex items-center justify-center bg-gradient-to-br from-blue-600 to-blue-400 rounded-full">
                        <i class="fa-solid fa-users text-white text-2xl sm:text-3xl"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">Tim Berpengalaman</h3>
                    <p class="text-gray-600 text-sm sm:text-base">
                        Profesional di bidang desain, pengembangan, & digital marketing.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Section: Harga Paket -->
    <section class="relative py-20 bg-gray-50 overflow-hidden" id="harga-paket">
        <!-- Background dots -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/triangular.png')] opacity-35"></div>

        <div class="relative max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <!-- Heading -->
            <div class="mb-14" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-[#136ad5] mb-3">Paket {{ $service->name }}</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Pilih paket terbaik sesuai kebutuhan layanan {{ strtolower($service->name) }} Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 place-items-center max-w-fit mx-auto">
                @foreach($service->packages as $package)
                    @php
                        $isPopular = $package->is_popular == 1;
                    @endphp

                    <div class="{{ $isPopular
                        ? 'relative bg-white rounded-3xl shadow-xl ring-2 ring-[#136ad5] scale-105 transition transform hover:scale-110 flex flex-col justify-between p-8'
                        : 'relative bg-white rounded-3xl shadow-md hover:shadow-xl transition p-8 flex flex-col justify-between'
                    }}"
                    data-aos="fade-up"
                    data-aos-delay="{{ 200 + ($loop->iteration * 100) }}">

                        {{-- Badge Popular --}}
                        @if($isPopular)
                            <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-[#136ad5] text-white text-xs uppercase font-bold px-4 py-1 rounded-full shadow-lg tracking-wide">
                                <i class="fa-solid fa-star mr-1 text-yellow-300"></i> Popular
                            </div>
                        @endif

                        <div>
                            <div class="mb-6">
                                {{-- Icon dinamis berdasarkan urutan --}}
                                @if($loop->iteration == 1)
                                    <i class="fa-solid fa-shirt text-5xl text-[#136ad5] mb-4"></i>
                                @elseif($loop->iteration == 2)
                                    <i class="fa-solid fa-school text-5xl text-[#136ad5] mb-4"></i>
                                @else
                                    <i class="fa-solid fa-laptop-code text-5xl text-[#136ad5] mb-4"></i>
                                @endif

                                <h3 class="text-xl font-semibold text-gray-800">{{ $package->name }}</h3>
                                <p class="text-gray-500 text-sm">{!! $package->description !!}</p>
                            </div>

                            {{-- Harga --}}
                            <div class="text-sm text-gray-600 mb-2 font-semibold">Start From :</div>
                            @if($package->original_price)
                                <div class="text-gray-500 line-through text-sm">
                                    Rp {{ number_format($package->original_price, 0, ',', '.') }}
                                </div>
                                <span class="bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full inline-block mb-3">
                                    Diskon {{ $package->discount }}%
                                </span>
                            @endif
                            <h4 class="text-[#136ad5] text-4xl font-extrabold mb-4">
                                Rp {{ number_format($package->price, 0, ',', '.') }}
                            </h4>
                        </div>

                        {{-- Includes --}}
                        @if($package->includes->count())
                            <ul class="text-sm text-gray-600 space-y-2 text-left border-t border-gray-200 pt-4">
                                @foreach($package->includes as $inc)
                                    <li><i class="fa-solid fa-check text-[#136ad5] mr-2"></i>{{ $inc->feature }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {{-- Excludes --}}
                        @if($package->excludes->count())
                            <ul class="text-sm text-gray-500 space-y-2 text-left border-t border-gray-100 pt-3 mt-3">
                                @foreach($package->excludes as $exc)
                                    <li><i class="fa-solid fa-xmark text-red-500 mr-2"></i>{{ $exc->feature }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <a href="https://wa.me/{{ $contacts->phone }}?text={{ rawurlencode('Halo Liradigi, saya tertarik dengan paket ' . $package->name . '. Bisa minta informasi lebih lanjut?') }}" target="_blank"
                        class="inline-block mt-6 bg-[#136ad5] text-white font-semibold px-5 py-2 rounded-lg hover:bg-yellow-500 hover:text-white transition">
                            Diskusi Sekarang
                        </a>
                    </div>
                @endforeach
            </div>


        </div>
    </section>

    <section class="py-20 bg-gradient-to-b from-white to-blue-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-[#136ad5] mb-3" data-aos="fade-up">
            Portofolio Terbaru
            </h2>
            <p class="text-gray-600 mb-12" data-aos="fade-up" data-aos-delay="100">
            Beberapa portofolio website klien yang pernah kami kerjakan sebelumnya
            </p>

            <!-- Carousel Container -->
            <div class="relative overflow-hidden">
                <div id="portfolio-track" class="flex gap-6 transition-transform duration-700 ease-in-out">
                    <!-- Item -->
                    @foreach($portfolios as $portfolio)
                    <div class="min-w-[300px] md:min-w-[350px] flex-shrink-0 shadow-lg">
                        <a href="{{$portfolio->url}}" target="_blank">
                            <img src="{{ asset('storage/' . $portfolio->image) }}"
                                class="w-full h-52 md:h-64 object-cover rounded-xl shadow-lg"
                                alt="{{$portfolio->name}}">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gradient-to-b from-white to-blue-50 overflow-hidden" id="testimoni">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-[#136ad5] mb-2" data-aos="fade-up">
                Apa Kata Klien Kami?
            </h2>
            <p class="text-gray-600 mb-10 text-sm md:text-base" data-aos="fade-up" data-aos-delay="100">
                Cerita singkat dari klien yang telah mempercayakan project mereka bersama <strong>Liradigi</strong>.
            </p>

            <!-- Slider Container -->
            <div class="relative overflow-hidden">
                <div id="testimoni-track" class="flex gap-6 transition-transform duration-700 ease-in-out">

                @foreach($testimonials as $testimonial)
                    <div class="flex-none w-64 bg-white shadow rounded-xl p-5 text-center" data-aos="fade-up">

                        <!-- Foto -->
                        <img
                            src="{{ $testimonial->photo ? asset('storage/' . $testimonial->photo) : 'https://i.pravatar.cc/80' }}"
                            class="w-14 h-14 mx-auto rounded-full mb-3 border-2 border-blue-100"
                            alt="{{ $testimonial->name }}"
                        >

                        <!-- Pesan -->
                        <p class="text-gray-600 text-sm italic mb-3">
                            “{{ $testimonial->message }}”
                        </p>

                        <!-- Rating -->
                        <div class="flex justify-center text-yellow-400 text-xs mb-1">
                            @for ($i = 1; $i <= 5; $i++)
                                @if($i <= $testimonial->rating)
                                    <i class="fa-solid fa-star"></i>
                                @else
                                    <i class="fa-regular fa-star"></i>
                                @endif
                            @endfor
                        </div>

                        <!-- Nama -->
                        <h4 class="font-semibold text-gray-800 text-sm">{{ $testimonial->name }}</h4>
                        <p class="text-xs text-gray-500">{{ $testimonial->company }}</p>

                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="py-20 bg-gradient-to-b from-white to-blue-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-[#136ad5] mb-3" data-aos="fade-up">
                Artikel Terbaru Kami
            </h2>
            <p class="text-gray-600 mb-12" data-aos="fade-up" data-aos-delay="100">
                Temukan Insight seputar Teknologi, Website dan Transformasi Digital yang akan membantu Bisnis Anda Berkembang.
            </p>
        </div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">

                @forelse($articles as $index => $article)
                    <div class="group bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all overflow-hidden"
                        data-aos="fade-up"
                        data-aos-delay="{{ 100 * ($index + 1) }}">

                        <div class="overflow-hidden">
                            <img src="{{ $article->featured_image ? asset('storage/' . $article->featured_image) : asset('assets/website/img/blog/default.jpg') }}"
                                alt="{{ $article->title }}"
                                class="w-full h-56 object-cover transform group-hover:scale-110 transition duration-700">
                        </div>

                        <div class="p-6">
                            <a href="{{ url('artikel/' . $article->category . '/' . $article->slug) }}">
                                <h3 class="text-xl font-semibold text-[#136ad5] mb-2">
                                    {{ $article->title }}
                                </h3>
                            </a>
                            <p class="text-gray-600 text-sm mb-4">
                                {{ Str::limit(strip_tags($article->excerpt ?? $article->content), 120) }}
                            </p>
                            <a href="{{ url('artikel/' . $article->category . '/' . $article->slug) }}"
                            class="text-[#00a2ff] font-medium hover:underline">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center text-gray-500 py-10">
                        Belum ada artikel yang dipublikasikan.
                    </div>
                @endforelse

            </div>
        </div>
    </section>


    <!-- Section: Call To Action -->
    <section class="relative py-20 bg-gradient-to-r from-[#136ad5] via-blue-500 to-blue-400 text-white overflow-hidden">
    <!-- Background Pattern -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/triangular.png')] opacity-35"></div>

        <div class="relative max-w-6xl mx-auto px-6 lg:px-8 text-center" data-aos="zoom-in">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 leading-snug">
            Siap Membawa Bisnis Anda ke Level Selanjutnya?
            </h2>
            <p class="text-blue-100 max-w-2xl mx-auto mb-8 text-lg">
            Kami bantu wujudkan website profesional, cepat, dan menarik agar bisnis Anda tampil unggul di dunia digital.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ url('/cara-order') }}"
                    class="px-8 py-3 bg-white text-[#136ad5] font-semibold rounded-xl shadow-md hover:bg-yellow-500 hover:text-white transition">
                    Mulai Sekarang
                </a>
                <a href="{{ url('/portfolio') }}"
                    class="px-8 py-3 border-2 border-white text-white font-semibold rounded-xl hover:bg-white hover:text-[#136ad5] transition">
                    Lihat Portfolio
                </a>
            </div>
        </div>

        <!-- Decorative Blobs -->
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-60 h-60 bg-blue-300/20 rounded-full blur-3xl"></div>
    </section>


    @include('website.layouts.whatsapp')
    @include('website.layouts.footer')
    @include('website.components.google-tag-body')

    </body>
    </html>
