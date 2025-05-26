@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<h2 class="text-2xl font-semibold mb-6">Edit Kamar</h2>

<form action="{{ route('kamar.update', $kamar) }}" method="POST" class="max-w-md bg-white p-6 rounded shadow-md" enctype="multipart/form-data">
    @csrf 
    @method('PUT')

    <div class="mb-4">
        <label for="nomor_kamar" class="block text-gray-700 font-medium mb-1">Nomor Kamar</label>
        <input type="text" id="nomor_kamar" name="nomor_kamar" 
               value="{{ $kamar->nomor_kamar }}" 
               required
               class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <div class="mb-4">
        <label for="tipe_kamar" class="block text-gray-700 font-medium mb-1">Tipe Kamar</label>
        <input type="text" id="tipe_kamar" name="tipe_kamar" 
               value="{{ $kamar->tipe_kamar }}" 
               required
               class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <div class="mb-4">
        <label for="harga_per_malam" class="block text-gray-700 font-medium mb-1">Harga Per Malam</label>
        <input type="number" id="harga_per_malam" name="harga_per_malam" 
               value="{{ $kamar->harga_per_malam }}" 
               required
               class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <div class="mb-4">
    <label for="gambar" class="block font-semibold mb-1">Foto Kamar (Opsional)</label>
    <input type="file" name="gambar" id="gambar" class="border rounded px-3 py-2" accept="image/*">
</div>

@if ($kamar->gambar)
    <img src="{{ asset('img/' . $kamar->gambar) }}" alt="Foto Kamar" class="w-48 h-32 object-cover rounded">
@endif

    <div class="mb-6">
        <label for="status" class="block text-gray-700 font-medium mb-1">Status</label>
        <select id="status" name="status" 
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="tersedia" {{ $kamar->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
            <option value="dipesan" {{ $kamar->status == 'dipesan' ? 'selected' : '' }}>Dipesan</option>
        </select>
    </div>

    <button type="submit" 
            class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition font-semibold">
        Update
    </button>
    <a href="{{ url()->previous() }}" 
        class="inline-block px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
        Kembali
    </a>

</form>
@endsection
