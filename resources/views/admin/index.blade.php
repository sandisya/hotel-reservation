@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md p-4 space-y-4">
        <h2 class="text-xl font-bold mb-4">Admin Panel</h2>
        <nav class="space-y-2">
            <a href="{{ route('kamar.index') }}"
               class="block px-4 py-2 rounded hover:bg-blue-100 {{ request()->routeIs('kamar.index') ? 'bg-blue-200 font-semibold' : '' }}">
                Kelola Kamar
            </a>
            <a href="{{ route('admin.users') }}"
               class="block px-4 py-2 rounded hover:bg-blue-100 {{ request()->routeIs('admin.users') ? 'bg-blue-200 font-semibold' : '' }}">
                Daftar Pengguna
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <h2 class="text-3xl font-bold mb-4">Selamat Datang, Admin!</h2>

        <p class="text-gray-700 mb-6">
            Ini adalah halaman dashboard admin. Dari sini, Anda dapat mengelola kamar hotel dan melihat daftar pengguna yang telah terdaftar di sistem.
        </p>

        <div class="bg-white rounded shadow p-4">
            <h3 class="text-xl font-semibold mb-2">Panduan Singkat</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-1">
                <li><strong>Kelola Kamar:</strong> Tambah, ubah, atau hapus data kamar hotel.</li>
                <li><strong>Daftar Pengguna:</strong> Lihat daftar semua pengguna yang telah mendaftar.</li>
            </ul>
        </div>
    </main>
</div>
@endsection
