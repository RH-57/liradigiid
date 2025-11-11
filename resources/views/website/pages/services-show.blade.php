<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $service->meta_title ?? $service->name }} - Liradigi</title>
    <meta name="description" content="{{ $service->meta_description ?? Str::limit(strip_tags($service->description), 150) }}">
    <meta name="keywords" content="{{ $service->meta_keywords }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/website/img/logo.png') }}">
    <meta property="og:title" content="{{ $service->meta_title ?? $service->name }}">
    <meta property="og:description" content="{{ $service->meta_description }}">
    <meta property="og:image" content="{{ asset('storage/' . $service->meta_image) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    @include('website.components.google-tag-header')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

    <!-- Paket Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <!--
            <h2 class="text-3xl md:text-4xl font-bold text-[#136ad5] mb-3">Pilihan Paket</h2>
            <p class="text-gray-600 max-w-2xl mx-auto mb-12">Pilih paket terbaik sesuai kebutuhan layanan {{ strtolower($service->name) }} Anda.</p> -->

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($service->packages as $index => $package)
                <div class="bg-white rounded-3xl shadow-md hover:shadow-xl transition p-8 flex flex-col justify-between" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-1">{{ $package->name }}</h3>
                        <p class="text-gray-500 text-sm mb-3">{{ $package->description }}</p>
                        <h4 class="text-[#136ad5] text-3xl font-extrabold mb-3">Rp {{ number_format($package->price, 0, ',', '.') }}</h4>
                    </div>

                    <!-- Includes -->
                    @if($package->includes->count())
                        <ul class="text-sm text-gray-600 space-y-2 text-left border-t border-gray-200 pt-4">
                            @foreach($package->includes as $inc)
                                <li><i class="fa-solid fa-check text-[#136ad5] mr-2"></i> {{ $inc->name }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <!-- Excludes -->
                    @if($package->excludes->count())
                        <ul class="text-sm text-gray-500 space-y-2 text-left border-t border-gray-100 pt-3 mt-3">
                            @foreach($package->excludes as $exc)
                                <li><i class="fa-solid fa-xmark text-red-500 mr-2"></i> {{ $exc->name }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <a href="{{ url('/cara-order') }}" class="inline-block mt-6 bg-[#136ad5] text-white font-semibold px-5 py-2 rounded-lg hover:bg-yellow-500 hover:text-white transition">
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
    @include('website.components.google-tag-body')
</body>
</html>
