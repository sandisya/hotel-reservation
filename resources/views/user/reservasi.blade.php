@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md p-4 space-y-4">
        <h2 class="text-xl font-bold mb-4">Menu Pelanggan</h2>
        <nav class="space-y-2">
            <a href="{{ route('user.dashboard') }}"
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
        <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow-md">
            <h2 class="text-3xl font-bold mb-2">Reservasi Kamar</h2>
            <p class="text-gray-600 mb-6">
                Silakan pilih kamar dan tanggal menginap Anda. Data reservasi Anda juga ditampilkan di bawah.
            </p>

            <form action="{{ url('/user/reservasi') }}" method="POST" class="mb-8">
                @csrf
                <div class="mb-4">
                    <label class="block font-semibold mb-1" for="kamar_id">Pilih Kamar</label>
                    <select name="kamar_id" id="kamar_id" class="w-full border border-gray-300 rounded px-3 py-2" required>
                        @foreach ($kamars as $kamar)
                        <option value="{{ $kamar->id }}" data-gambar="{{ asset('img/' . $kamar->gambar) }}">
                            {{ $kamar->nomor_kamar }} - {{ $kamar->tipe_kamar }} (Rp {{ number_format($kamar->harga_per_malam) }})
                        </option>
                        @endforeach
                    </select>
                    <div id="preview-gambar-kamar" class="mt-2">
                        <!-- Gambar kamar akan muncul di sini -->
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold mb-1" for="check_in">Tanggal Check-in</label>
                    <input type="date" name="check_in" id="check_in" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold mb-1" for="check_out">Tanggal Check-out</label>
                    <input type="date" name="check_out" id="check_out" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>

                <button type="submit" class="bg-green-600 text-white font-semibold px-6 py-2 rounded hover:bg-green-700 transition">
                    Buat Reservasi
                </button>
                <a href="{{ url()->previous() }}" 
                   class="inline-block px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 ml-2">
                    Kembali
                </a>
            </form>

            <hr class="my-8">

            <h3 class="text-2xl font-semibold mb-4">Reservasi Saya</h3>

            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 rounded">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2 text-left">Kamar</th>
                            <th class="border px-4 py-2 text-left">Check-in</th>
                            <th class="border px-4 py-2 text-left">Check-out</th>
                            <th class="border px-4 py-2 text-left">Total Harga</th>
                            <th class="border px-4 py-2 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservasis as $r)
                        <tr class="odd:bg-white even:bg-gray-50">
                            <td class="border px-4 py-2 flex items-center space-x-2">
                                @if ($r->kamar->gambar)
                                    <img src="{{ asset('img/' . $r->kamar->gambar) }}" alt="Foto Kamar" class="w-16 h-12 object-cover rounded">
                                @endif
                                <span>{{ $r->kamar->nomor_kamar }} ({{ $r->kamar->tipe_kamar }})</span>
                            </td>
                            <td class="border px-4 py-2">{{ $r->check_in }}</td>
                            <td class="border px-4 py-2">{{ $r->check_out }}</td>
                            <td class="border px-4 py-2">Rp {{ number_format($r->total_harga) }}</td>
                            <td class="border px-4 py-2">{{ ucfirst($r->status) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<script>
    const selectKamar = document.getElementById('kamar_id');
    const previewDiv = document.getElementById('preview-gambar-kamar');

    function updateImage() {
        const selectedOption = selectKamar.options[selectKamar.selectedIndex];
        const imgSrc = selectedOption.getAttribute('data-gambar');

        if (imgSrc) {
            previewDiv.innerHTML = `<img src="${imgSrc}" alt="Foto Kamar" class="w-48 h-32 object-cover rounded shadow">`;
        } else {
            previewDiv.innerHTML = '';
        }
    }

    selectKamar.addEventListener('change', updateImage);
    updateImage(); // Load gambar pertama saat halaman dimuat
</script>
@endsection
