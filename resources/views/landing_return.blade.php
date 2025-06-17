<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Status Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100 px-4">
    <div class="bg-white shadow-lg p-8 rounded-xl max-w-md text-center">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Status Pembayaran Anda</h1>
        <p class="mb-2">Order ID: <strong>{{ $orderId }}</strong></p>
        <p>Status Transaksi: 
            <span class="font-semibold {{ $status === 'settlement' ? 'text-green-600' : 'text-red-600' }}">
                {{ ucfirst($status) }}
            </span>
        </p>
        <a href="/" class="inline-block mt-6 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">Kembali ke Beranda</a>
    </div>
</body>
</html>
