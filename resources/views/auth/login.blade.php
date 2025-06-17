<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aplikasi Reservasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-indigo-500 to-purple-100 flex items-center justify-center px-4 relative">

    <!-- Panah kembali -->
    <a href="{{ url('/') }}" class="absolute top-6 left-6 text-gray-800 hover:text-gray-600 dark:text-white dark:hover:text-gray-300 text-2xl">
        ←
    </a>

    <div class="bg-white dark:bg-gray-700 w-full max-w-md p-8 rounded-3xl shadow-2xl">
        <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-white mb-6">
            Selamat Datang 👋
        </h2>
        <p class="text-center text-sm text-gray-500 dark:text-gray-400 mb-8">
            Masuk untuk melanjutkan ke dashboard
        </p>

        @if (session('status'))
            <div class="mb-4 text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 outline-none" />
                @error('email')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Password</label>
                <input id="password" name="password" type="password" required
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 outline-none" />
                @error('password')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember me & forgot -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center text-gray-700 dark:text-gray-300">
                    <input type="checkbox" name="remember" class="h-4 w-4 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500">
                    <span class="ml-2">Ingat saya</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-indigo-600 hover:underline dark:text-indigo-400">
                        Lupa Password?
                    </a>
                @endif
            </div>

            <!-- Button -->
            <div>
                <button type="submit"
                    class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-lg transition duration-200">
                    Masuk
                </button>
            </div>

            <!-- Register -->
            <p class="text-center text-sm text-gray-600 dark:text-gray-400 mt-6">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-indigo-600 hover:underline dark:text-indigo-400">
                    Daftar sekarang
                </a>
            </p>
        </form>
    </div>
</body>
</html>
