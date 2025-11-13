<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $service->meta_title ?? $service->name }} - Liradigi</title>
    <meta name="description" content="{{ $service->meta_description ?? Str::limit(strip_tags($service->description), 150) }}">
    <meta name="keywords" content="{{ $service->meta_keywords }}">
    <link rel="icon" href="{{asset('assets/website/img/favicon.ico')}}" type="image/x-icon">
    <meta property="og:title" content="{{ $service->meta_title ?? $service->name }}">
    <meta property="og:description" content="{{ $service->meta_description }}">
    <meta property="og:image" content="{{ asset('storage/' . $service->meta_image) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    @include('website.components.google-tag-header')

    <!--@vite(['resources/css/app.css', 'resources/js/app.js'])-->
    <link rel="stylesheet" href="{{ asset('build/assets/app-DKXroJdo.css') }}">
</head>
<body>
    @include('website.layouts.header')

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-blue-600 to-blue-400 text-white py-28 overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/triangular.png')] opacity-25"></div>
        <div class="relative max-w-6xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $service->name }}</h1>
            <p class="text-blue-100 text-lg max-w-2xl mx-auto">{!! $service->description !!}</p>
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

   <!-- Paket Section -->
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

                        <a href="{{ url('/cara-order') }}"
                        class="inline-block mt-6 bg-[#136ad5] text-white font-semibold px-5 py-2 rounded-lg hover:bg-yellow-500 hover:text-white transition">
                            Diskusi Sekarang
                        </a>
                    </div>
                @endforeach
            </div>


        </div>
    </section>


    <!-- FAQ Section -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-[#136ad5] mb-10">
            Pertanyaan yang Sering Diajukan
            </h2>

            <div x-data="{ active: null }" class="space-y-4">
            @foreach($faqs as $index => $faq)
                <div class="border border-gray-200 rounded-xl overflow-hidden shadow-sm">
                <!-- Header -->
                <button
                    @click="active === {{ $index }} ? active = null : active = {{ $index }}"
                    class="flex justify-between items-center w-full px-5 py-4 text-left text-gray-800 font-medium hover:bg-blue-200 transition"
                >
                    <span>{{ $faq->question }}</span>
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 transform transition-transform duration-300"
                    :class="active === {{ $index }} ? 'rotate-180 text-[#136ad5]' : 'rotate-0 text-gray-400'"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Content -->
                <div
                    x-show="active === {{ $index }}"
                    x-collapse
                    class="px-5 pb-5 text-gray-600"
                >
                    {!! $faq->answer !!}
                </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>



    <!-- CTA Section -->
    <section class="relative py-20 bg-gradient-to-r from-[#136ad5] via-blue-500 to-blue-400 text-white text-center">
        <div class="max-w-5xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Ingin Konsultasi Lebih Lanjut?</h2>
            <p class="text-blue-100 mb-8">Tim kami siap membantu Anda memilih solusi terbaik untuk kebutuhan {{ strtolower($service->name) }} Anda.</p>
            <a href="{{ url('/cara-order') }}" class="px-8 py-3 bg-white text-[#136ad5] font-semibold rounded-xl shadow hover:bg-yellow-500 hover:text-white transition">
                Hubungi Kami Sekarang
            </a>
        </div>
    </section>

    @include('website.layouts.whatsapp')
    @include('website.layouts.footer')
    <script src="{{ asset('build/assets/app-BYk74Vyi.js') }}" defer></script>
</body>
</html>
