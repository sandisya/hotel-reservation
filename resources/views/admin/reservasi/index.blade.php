@extends('layouts.app')

@section('content')
<div class="flex">
    <aside class="w-64 bg-gray-100 h-screen p-6 shadow-md">
        <h2 class="text-lg font-semibold mb-4">Menu Admin</h2>
        <ul class="space-y-3">
            <li><a href="{{ route('kamar.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200">Kelola Kamar</a></li>
            <li><a href="{{ route('admin.users') }}" class="block px-4 py-2 rounded hover:bg-gray-200">Daftar Pengguna</a></li>
            <li><a href="{{ route('admin.reservasi.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200">Validasi Reservasi</a></li>
        </ul>
    </aside>

    <main class="flex-1 p-6">
        <h2 class="text-2xl font-semibold mb-6">Validasi Reservasi</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                <thead>
                    <tr class="bg-gray-100 text-left text-gray-600 uppercase text-sm">
                        <th class="py-3 px-4 border-b">User</th>
                        <th class="py-3 px-4 border-b">Kamar</th>
                        <th class="py-3 px-4 border-b">Tanggal</th>
                        <th class="py-3 px-4 border-b">Total</th>
                        <th class="py-3 px-4 border-b">Status Validasi</th>
                        <th class="py-3 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reservasis as $r)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4 border-b">{{ $r->user->name }}</td>
                        <td class="py-3 px-4 border-b">{{ $r->kamar->nomor_kamar ?? '-' }}</td>
                        <td class="py-3 px-4 border-b">{{ $r->check_in }} → {{ $r->check_out }}</td>
                        <td class="py-3 px-4 border-b">Rp {{ number_format($r->total_harga) }}</td>
                        <td class="py-3 px-4 border-b capitalize">{{ $r->status_validasi }}</td>
                        <td class="py-3 px-4 border-b">
                            @if($r->status_validasi === 'menunggu')
                            <form action="{{ route('admin.reservasi.validasi', $r->id) }}" method="POST" class="flex space-x-2">
                                @csrf
                                <select name="status_validasi" class="border rounded px-2 py-1 text-sm">
                                    <option value="disetujui">Setujui</option>
                                    <option value="ditolak">Tolak</option>
                                </select>
                                <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">Kirim</button>
                            </form>
                            @else
                                <span class="text-sm italic text-gray-600">Sudah divalidasi</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center py-4 text-gray-500 italic">Belum ada reservasi</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection
