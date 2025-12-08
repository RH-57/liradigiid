<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <title>{{ $service->meta_title ?? $service->name }} - Liradigi</title>
    <meta name="description" content="{{ $service->meta_description ?? Str::limit(strip_tags($service->description), 150) }}">
    <meta name="keywords" content="{{ $service->meta_keywords }}">
    <meta property="og:title" content="{{ $service->meta_title ?? $service->name }}">
    <meta property="og:description" content="{{ $service->meta_description }}">
    <meta property="og:image" content="{{ asset('storage/' . $service->meta_image) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <link rel="canonical" href="{{ url()->current() }}">

    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </noscript>
    @include('website.components.google-tag-header')
    @include('website.components.google-tag-footer')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('website.layouts.header')

    <section class="relative min-h-screen flex items-center bg-gradient-to-br from-blue-600 to-blue-400 pt-28 md:pt-16 pb-10 overflow-hidden">

        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/triangular.png')] opacity-15"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-8 items-center relative z-10">

            <div class="space-y-4 max-w-xl text-white text-center md:text-left" data-aos="fade-right">
                <h1 class="text-3xl md:text-4xl lg:text-2xl font-bold leading-snug">
                    {{$service->headline}}
                </h1>
                <p class="text-blue-100 text-base md:text-lg">
                    {!!$service->headline_description!!}
                </p>
                <br />
                <div class="flex flex-wrap justify-center md:justify-start gap-3">
                    <a href="https://wa.me/{{$contacts->phone}}?text=Halo%20Liradigi%2C%20saya%20tertarik%20untuk%20membuat%20website.%20Bisa%20minta%20informasi%20lebih%20lanjut%3F"
                        target="_blank"
                        class="group relative px-6 py-3 font-semibold text-blue-600 rounded-2xl shadow-[0_0_10px_5px_rgba(255,255,255,0.8)]
                            bg-white
                            hover:bg-yellow-500 hover:text-white
                            transition-all duration-300 transform hover:-translate-y-1
                            hover:shadow-[0_0_20px_6px_rgba(255,204,0,0.6)]
                            overflow-hidden">

                        <!-- Shine Sweep -->
                        <span class="absolute inset-0 w-full h-full bg-white opacity-0 group-hover:opacity-10
                                    transition-opacity duration-300"></span>

                        <!-- WhatsApp Icon Slide In -->
                        <span class="absolute left-6 top-1/2 -translate-y-1/2 flex items-center opacity-0
                                    -translate-x-3 group-hover:opacity-100 group-hover:translate-x-0
                                    transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-6 h-6 fill-white drop-shadow-lg">
                                <path
                                    d="M380.9 97.1C339 55.1 283.2 32 223.9 32 103.5 32 8 127.5 8 248c0 43.9 11.5 86.2 33.5 123.4L0 480l112.9-41.2c35.3 19.3 74.6 29.4 114.9 29.4h.1c120.4 0 215.9-95.5 215.9-216 0-59.3-23.1-115.1-65-157.1zM223.9 438.6c-36.2 0-71.7-9.7-102.6-28.1l-7.3-4.3-66.9 24.4 22.4-68.9-4.8-7.1c-20.6-30.5-31.4-66.1-31.4-102.6 0-101.6 82.7-184.3 184.6-184.3 49.3 0 95.6 19.2 130.4 54 34.8 34.8 54 81.1 54 130.4 0 101.8-82.7 184.5-184.4 184.5zm101.5-138.4c-5.6-2.8-33.1-16.3-38.2-18.1-5.1-1.9-8.8-2.8-12.5 2.8s-14.3 18.1-17.5 21.8-6.5 4.2-12.1 1.4-23.6-8.7-45-27.7c-16.6-14.8-27.8-33.1-31.1-38.7s-.3-8.6 2.5-11.4c2.6-2.6 5.6-6.6 8.4-9.9 2.8-3.3 3.7-5.6 5.6-9.3 1.9-3.7.9-7-0.5-9.8s-12.5-30-17.1-41.1c-4.5-10.8-9.1-9.4-12.5-9.6-3.2-.2-7-.2-10.7-.2s-9.8 1.4-15 7c-5.1 5.6-19.6 19.1-19.6 46.6s20.1 54 22.9 57.7c2.8 3.7 39.6 60.5 96.1 84.8 13.4 5.8 23.8 9.3 31.9 11.9 13.4 4.3 25.6 3.7 35.2 2.2 10.7-1.6 33.1-13.5 37.8-26.6s4.7-24.3 3.3-26.6c-1.3-2.3-5.1-3.7-10.7-6.6z" />
                            </svg>
                        </span>

                        <!-- Text -->
                        <span class="ml-2 group-hover:ml-8 transition-all duration-300 block">
                            Buat {{$service->name}} Sekarang
                        </span>
                    </a>
                    <a href="#harga-paket" class="px-5 py-2.5 border-2 border-yellow-300 text-yellow-300 rounded-xl font-medium hover:bg-white hover:text-[#136ad5] transition">
                        Lihat Harga
                    </a>
                </div>
            </div>

            <!-- Right: Floating Image -->
            <div class="flex justify-center md:justify-end mt-10 md:mt-0" data-aos="fade-left">
                <img
                    src="{{ asset('storage/'. $service->hero_image) }}"
                    alt="{{$service->name}}"
                    class="w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg rounded-2xl"
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
                <div class="p-6 rounded-2xl text-white
                    bg-gradient-to-br from-blue-500 via-blue-600 to-blue-700
                    shadow-[8px_8px_20px_rgba(0,0,0,0.25),-4px_-4px_12px_rgba(255,255,255,0.15)]
                    border border-blue-400/20
                    relative overflow-hidden
                    before:absolute before:inset-0
                    before:bg-gradient-to-tl before:from-white/10 before:to-transparent
                    before:opacity-20
                    hover:scale-[1.03] hover:-translate-y-1 hover:shadow-[12px_12px_28px_rgba(0,0,0,0.35),-6px_-6px_18px_rgba(255,255,255,0.25)]
                    transition-all duration-300"
                    data-aos="zoom-in" data-aos-delay="200">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 mx-auto mb-5 flex items-center justify-center bg-gradient-to-br from-blue-600 to-blue-400 rounded-full">
                        <i class="fa-solid fa-palette text-white text-2xl sm:text-3xl"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-white mb-2">Desain Profesional</h3>
                    <p class="text-gray-300 text-sm sm:text-base">
                        Website dengan tampilan modern dan pengalaman pengguna optimal.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="p-6 rounded-2xl text-white
                    bg-gradient-to-br from-blue-500 via-blue-600 to-blue-700
                    shadow-[8px_8px_20px_rgba(0,0,0,0.25),-4px_-4px_12px_rgba(255,255,255,0.15)]
                    border border-blue-400/20
                    relative overflow-hidden
                    before:absolute before:inset-0
                    before:bg-gradient-to-tl before:from-white/10 before:to-transparent
                    before:opacity-20
                    hover:scale-[1.03] hover:-translate-y-1 hover:shadow-[12px_12px_28px_rgba(0,0,0,0.35),-6px_-6px_18px_rgba(255,255,255,0.25)]
                    transition-all duration-300"
                    data-aos="zoom-in" data-aos-delay="200">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 mx-auto mb-5 flex items-center justify-center bg-gradient-to-br from-blue-600 to-blue-400 rounded-full">
                        <i class="fa-solid fa-bolt text-white text-2xl sm:text-3xl"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-white mb-2">Cepat & Responsif</h3>
                    <p class="text-gray-300 text-sm sm:text-base">
                        Optimasi performa untuk kecepatan tinggi di semua perangkat.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="p-6 rounded-2xl text-white
                    bg-gradient-to-br from-blue-500 via-blue-600 to-blue-700
                    shadow-[8px_8px_20px_rgba(0,0,0,0.25),-4px_-4px_12px_rgba(255,255,255,0.15)]
                    border border-blue-400/20
                    relative overflow-hidden
                    before:absolute before:inset-0
                    before:bg-gradient-to-tl before:from-white/10 before:to-transparent
                    before:opacity-20
                    hover:scale-[1.03] hover:-translate-y-1 hover:shadow-[12px_12px_28px_rgba(0,0,0,0.35),-6px_-6px_18px_rgba(255,255,255,0.25)]
                    transition-all duration-300"
                    data-aos="zoom-in" data-aos-delay="200">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 mx-auto mb-5 flex items-center justify-center bg-gradient-to-br from-blue-600 to-blue-400 rounded-full">
                        <i class="fa-solid fa-headset text-white text-2xl sm:text-3xl"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-white mb-2">Support Penuh</h3>
                    <p class="text-gray-300 text-sm sm:text-base">
                        Dukungan teknis & pemeliharaan berkelanjutan setelah website online.
                    </p>
                </div>

                <!-- Card 4 -->
                <div class="p-6 rounded-2xl text-white
                    bg-gradient-to-br from-blue-500 via-blue-600 to-blue-700
                    shadow-[8px_8px_20px_rgba(0,0,0,0.25),-4px_-4px_12px_rgba(255,255,255,0.15)]
                    border border-blue-400/20
                    relative overflow-hidden
                    before:absolute before:inset-0
                    before:bg-gradient-to-tl before:from-white/10 before:to-transparent
                    before:opacity-20
                    hover:scale-[1.03] hover:-translate-y-1 hover:shadow-[12px_12px_28px_rgba(0,0,0,0.35),-6px_-6px_18px_rgba(255,255,255,0.25)]
                    transition-all duration-300"
                    data-aos="zoom-in" data-aos-delay="200">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 mx-auto mb-5 flex items-center justify-center bg-gradient-to-br from-blue-600 to-blue-400 rounded-full">
                        <i class="fa-solid fa-users text-white text-2xl sm:text-3xl"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-white mb-2">Tim Berpengalaman</h3>
                    <p class="text-gray-300 text-sm sm:text-base">
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
                    {!!$service->description!!}
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
                        class="mt-5 group relative px-6 py-3 font-semibold text-white rounded-2xl shadow-[0_0_20px_6px_rgba(100,109,255,0.8)]
                            bg-blue-600
                            hover:bg-yellow-500 hover:text-white
                            transition-all duration-300 transform hover:-translate-y-1
                            hover:shadow-[0_0_20px_6px_rgba(255,204,0,0.6)]
                            overflow-hidden">
                            Buat Website Sekarang
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
            <a href="https://wa.me/{{$contacts->phone}}?text=Halo%20Liradigi%2C%20saya%20tertarik%20untuk%20membuat%20website.%20Bisa%20minta%20informasi%20lebih%20lanjut%3F" class="px-8 py-3 bg-white text-[#136ad5] font-semibold rounded-xl shadow hover:bg-yellow-500 hover:text-white transition">
                Hubungi Kami Sekarang
            </a>
        </div>
    </section>

    @include('website.layouts.whatsapp')
    @include('website.layouts.footer')
    @include('website.components.google-tag-body')
</body>
</html>
