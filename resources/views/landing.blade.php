<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang di Reservasi Hotel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-indigo-500 to-purple-400 min-h-screen flex flex-col">
    <header class="w-full bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-indigo-600">Aplikasi Reservasi Hotel</h1>
        <div class="space-x-4">
            <a href="{{ route('login') }}" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Login</a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Daftar</a>
        </div>
    </header>

    <main class="flex-grow flex items-center justify-center text-center px-4">
        <div class="max-w-2xl">
            <h2 class="text-4xl font-bold text-white mb-4">Selamat Datang!</h2>
            <p class="text-lg text-white mb-6">
                Kami menyediakan layanan reservasi hotel yang mudah, cepat, dan aman. Silakan login atau daftar untuk melanjutkan.
            </p>
            <a href="{{ route('login') }}" class="inline-block px-6 py-3 bg-white text-indigo-600 font-semibold rounded-lg shadow hover:bg-gray-100 transition">Mulai Sekarang</a>
        </div>
    </main>
</body>
</html>
