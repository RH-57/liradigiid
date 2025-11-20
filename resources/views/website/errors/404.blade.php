<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tidak Ditemukan | Liradigi</title>
    <meta name="description" content="Ups! Halaman yang Anda cari tidak ditemukan. Kembali ke beranda untuk melanjutkan.">
    <meta name="robots" content="noindex, nofollow">

    <link rel="icon" href="{{ asset('assets/website/img/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-blue-600 to-blue-400 min-h-screen flex flex-col items-center justify-center relative overflow-hidden text-white">

    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/triangular.png')] opacity-25"></div>

    <!-- Floating Decorative Circles -->
    <div class="absolute -top-10 -left-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-60 h-60 bg-blue-300/20 rounded-full blur-3xl"></div>

    <!-- Content -->
    <div class="relative z-10 text-center px-6 max-w-lg animate-fadeIn">

        <!-- Illustration -->
        <img src="{{asset('assets/website/img/404.webp')}}"
             alt="404 Illustration"
             class="w-full max-w-[650px] mx-auto mb-6">

        <h2 class="text-2xl md:text-3xl font-semibold mb-3">Halaman Tidak Ditemukan</h2>
        <p class="text-blue-100 mb-8 text-base md:text-lg">
            Sepertinya halaman yang Anda cari sudah tidak tersedia atau telah dipindahkan.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('web.home') }}"
               class="px-6 py-3 bg-white text-[#136ad5] font-semibold rounded-xl shadow hover:bg-yellow-500 hover:text-white transition">
                <i class="fa-solid fa-home mr-2"></i> Kembali ke Beranda
            </a>
        </div>
    </div>

    <!-- Footer -->
    <div class="absolute bottom-6 text-sm text-blue-100">
        © {{ date('Y') }} <strong>LiraDigi</strong>. Semua Hak Dilindungi.
    </div>

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .floating {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 1s ease forwards;
        }
    </style>

</body>
</html>
