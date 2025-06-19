<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Solusi Pertanian Untuk Indonesia Lebih Maju')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    {{-- Font Awesome untuk ikon (jika digunakan) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-100">
    <div id="app">
        <header class="bg-green-700 text-white p-4 shadow-md">
            <div class="container mx-auto flex justify-between items-center">
                <a href="{{ url('/') }}" class="text-2xl font-bold">Bio Subur</a>
                <nav class="flex items-center">
                    <ul class="flex space-x-4">
                        <li><a href="{{ route('home') }}" class="hover:text-green-200">Beranda</a></li>
                        <li><a href="{{ route('products.index') }}" class="hover:text-green-200">Produk</a></li>
                        <li><a href="{{ route('about.index') }}" class="hover:text-green-200">Tentang Kami</a></li>
                        <li><a href="{{ route('news.index') }}" class="hover:text-green-200">Berita & Artikel</a></li>
                        {{-- ======================================================= --}}
                        {{-- LINK TRANSAKSI HANYA UNTUK USER BIASA YANG SUDAH LOGIN --}}
                        {{-- ======================================================= --}}
                        @auth {{-- Menggunakan directive @auth untuk user biasa --}}
                            <li><a href="{{ route('transactions.index') }}" class="hover:text-green-200">Transaksi</a></li>
                        @endauth
                        <li><a href="{{ route('contact.index') }}" class="hover:text-green-200">Kontak</a></li>
                    </ul>

                    {{-- ======================================================= --}}
                    {{-- TOMBOL AUTHENTIKASI (USER BIASA DAN ADMIN) --}}
                    {{-- ======================================================= --}}
                    <div class="ml-6 flex items-center space-x-3">
                        @if (Auth::guard('admin')->check())
                            {{-- Tampilan untuk Admin yang Login --}}
                            <span class="text-green-200 text-sm hidden md:inline">Halo, {{ Auth::guard('admin')->user()->name }}</span>
                            <form action="{{ route('admin.logout') }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded-full text-sm transition duration-300">
                                    <i class="fas fa-sign-out-alt mr-1"></i> Logout
                                </button>
                            </form>
                        @elseif (Auth::check())
                            {{-- Tampilan untuk User Biasa yang Login --}}
                            <span class="text-green-200 text-sm hidden md:inline">Halo, {{ Auth::user()->name }}</span>
                            <form action="{{ route('logout') }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded-full text-sm transition duration-300">
                                    <i class="fas fa-sign-out-alt mr-1"></i> Logout
                                </button>
                            </form>
                        @else
                            {{-- Tampilan untuk Pengguna yang Belum Login (Guest) --}}
                            <a href="{{ route('login') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-3 rounded-full text-sm transition duration-300">
                                <i class="fas fa-sign-in-alt mr-1"></i> Login
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded-full text-sm transition duration-300">
                                    <i class="fas fa-user-plus mr-1"></i> Register
                                </a>
                            @endif
                        @endif
                    </div>
                </nav>
            </div>
        </header>

        <main class="py-8">
            @yield('content')
        </main>

        <footer class="bg-gray-800 text-white p-6 mt-8">
            <div class="container mx-auto text-center">
                <p>&copy; {{ date('Y') }} Bio Subur. Hak Cipta Dilindungi.</p>
                <div class="mt-2">
                    <a href="#" class="text-gray-400 hover:text-white mx-2">Kebijakan Privasi</a> |
                    <a href="#" class="text-gray-400 hover:text-white mx-2">Syarat & Ketentuan</a>
                </div>
            </div>
        </footer>
    </div>
    @stack('scripts')
</body>
</html>
