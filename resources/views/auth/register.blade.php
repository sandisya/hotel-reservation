<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Aplikasi Reservasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-purple-500 to-indigo-100 flex items-center justify-center px-4">
    <div class="bg-white dark:bg-gray-700 w-full max-w-md p-8 rounded-3xl shadow-2xl">
        <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-white mb-6">
            Daftar Akun Baru 📝
        </h2>
        <p class="text-center text-sm text-gray-500 dark:text-gray-400 mb-8">
            Buat akun untuk memulai reservasi kamar
        </p>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Nama -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Nama Lengkap</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 outline-none" />
                @error('name')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required
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

            <!-- Konfirmasi Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Konfirmasi Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 outline-none" />
                @error('password_confirmation')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Daftar -->
            <div>
                <button type="submit"
                    class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-lg transition duration-200">
                    Daftar
                </button>
            </div>

            <!-- Link ke Login -->
            <p class="text-center text-sm text-gray-600 dark:text-gray-400 mt-6">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-indigo-600 hover:underline dark:text-indigo-400">
                    Masuk di sini
                </a>
            </p>
        </form>
    </div>
</body>
</html>
