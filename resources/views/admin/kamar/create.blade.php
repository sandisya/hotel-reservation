@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<h2 class="text-2xl font-semibold mb-6">Tambah Kamar</h2>

<form action="{{ route('kamar.store') }}" method="POST" enctype="multipart/form-data" class="max-w-md bg-white p-6 rounded shadow-md">
    @csrf

    <div class="mb-4">
        <label for="nomor_kamar" class="block text-gray-700 font-medium mb-1">Nomor Kamar</label>
        <input type="text" id="nomor_kamar" name="nomor_kamar" required
               class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500" />
    </div>

    <div class="mb-4">
        <label for="tipe_kamar" class="block text-gray-700 font-medium mb-1">Tipe Kamar</label>
        <input type="text" id="tipe_kamar" name="tipe_kamar" required
               class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500" />
    </div>

    <div class="mb-6">
        <label for="harga_per_malam" class="block text-gray-700 font-medium mb-1">Harga Per Malam</label>
        <input type="number" id="harga_per_malam" name="harga_per_malam" required
               class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500" />
    </div>

    <div class="mb-4">
        <label for="gambar" class="block font-semibold">Foto Kamar</label>
        <input type="file" name="gambar" id="gambar" class="border rounded px-3 py-2" accept="image/*">
    </div>

    <button type="submit"
            class="px-5 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition font-semibold">
        Simpan
    </button>
    <a href="{{ url()->previous() }}" 
            class="inline-block px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 ml-2">
        Kembali
    </a>

</form>
@endsection
