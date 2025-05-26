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
        <h2 class="text-2xl font-semibold mb-4">Daftar Pengguna</h2>

        <table class="min-w-full bg-white border rounded shadow">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Dibuat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="border-t">
                    <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border">{{ $user->name }}</td>
                    <td class="px-4 py-2 border">{{ $user->email }}</td>
                    <td class="px-4 py-2 border">
                        {{ $user->created_at ? $user->created_at->format('d-m-Y') : '-' }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</div>
@endsection
