@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md p-4 space-y-4">
        <h2 class="text-xl font-bold mb-4">Menu Pelanggan</h2>
        <nav class="space-y-2">
            <a href="{{ url('/user/dashboard') }}"
               class="block px-4 py-2 rounded hover:bg-blue-100 {{ request()->is('user/dashboard') ? 'bg-blue-200 font-semibold' : '' }}">
                Dashboard
            </a>
            <a href="{{ url('/user/reservasi') }}"
               class="block px-4 py-2 rounded hover:bg-blue-100 {{ request()->is('user/reservasi') ? 'bg-blue-200 font-semibold' : '' }}">
                Reservasi Kamar
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <div class="bg-white p-6 rounded shadow-md">
            <h2 class="text-3xl font-bold mb-4">Selamat Datang di Dashboard Pelanggan</h2>

            <p class="text-gray-700 mb-6">
                Halo! Selamat datang di halaman pelanggan. Di sini Anda dapat melakukan reservasi kamar dan mengelola pemesanan Anda dengan mudah.
            </p>

            <a href="{{ url('/user/reservasi') }}"
               class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">
                Reservasi Kamar
            </a>
        </div>
    </main>
</div>
@endsection
