@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<div class="flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-100 h-screen p-6 shadow-md">
        <h2 class="text-lg font-semibold mb-4">Menu Admin</h2>
        <ul class="space-y-3">
            <li>
                <a href="{{ route('kamar.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200">Kelola Kamar</a>
            </li>
            <li>
                <a href="{{ route('admin.users') }}" class="block px-4 py-2 rounded hover:bg-gray-200">Daftar Pengguna</a>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <h2 class="text-2xl font-semibold mb-6">Data Kamar</h2>

        <a href="{{ route('kamar.create') }}" 
           class="inline-block mb-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
           + Tambah Kamar
        </a>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                <thead>
                    <tr class="bg-gray-100 text-left text-gray-600 uppercase text-sm">
                        <th class="py-3 px-4 border-b border-gray-300">Nomor Kamar</th>
                        <th class="py-3 px-4 border-b border-gray-300">Tipe</th>
                        <th class="py-3 px-4 border-b border-gray-300">Harga</th>
                        <th class="py-3 px-4 border-b border-gray-300">Status</th>
                        <th class="py-3 px-4 border-b border-gray-300">Gambar</th>
                        <th class="py-3 px-4 border-b border-gray-300">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kamars as $kamar)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4 border-b border-gray-200">{{ $kamar->nomor_kamar }}</td>
                        <td class="py-3 px-4 border-b border-gray-200">{{ $kamar->tipe_kamar }}</td>
                        <td class="py-3 px-4 border-b border-gray-200">Rp {{ number_format($kamar->harga_per_malam) }}</td>
                        <td class="py-3 px-4 border-b border-gray-200 capitalize">
                            @if($kamar->status === 'tersedia')
                                <span class="text-green-600 font-semibold">{{ $kamar->status }}</span>
                            @else
                                <span class="text-red-600 font-semibold">{{ $kamar->status }}</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 border-b border-gray-200">
                            @if ($kamar->gambar)
                                <img src="{{ asset('img/' . $kamar->gambar) }}" alt="Foto Kamar" class="w-48 h-32 object-cover rounded">

                            @else
                                <span class="text-gray-400 italic">Tidak ada gambar</span>
                            @endif
                        </td>

                        <td class="py-3 px-4 border-b border-gray-200 space-x-2">
                            <a href="{{ route('kamar.edit', $kamar) }}" 
                               class="inline-block px-3 py-1 bg-yellow-400 text-yellow-900 rounded hover:bg-yellow-500 transition text-sm font-semibold">
                               Edit
                            </a>
                            <form action="{{ route('kamar.destroy', $kamar) }}" method="POST" class="inline">
                                @csrf 
                                @method('DELETE')
                                <button 
                                  type="submit"
                                  onclick="return confirm('Yakin ingin menghapus kamar ini?')" 
                                  class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition text-sm font-semibold"
                                >
                                  Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection
