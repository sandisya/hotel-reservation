<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reservasi Hotel</title>
    @vite(['resources/js/app.js']) {{-- Jika pakai Vite --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <nav class="bg-white shadow p-4 mb-6">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-xl font-bold text-green-700">Hotel Reservation</a>

            <div class="flex items-center space-x-4">
                @auth
                    <span class="text-gray-700">Halo, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded font-semibold transition">
                            Logout
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 flex-grow">
        @yield('content')
    </main>

</body>
</html>
