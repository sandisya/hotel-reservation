@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Pembayaran Reservasi</h2>

    <p class="mb-2"><strong>Nomor Kamar:</strong> {{ $reservasi->kamar->nomor_kamar }}</p>
    <p class="mb-2"><strong>Tipe:</strong> {{ $reservasi->kamar->tipe_kamar }}</p>
    <p class="mb-2"><strong>Check-in:</strong> {{ $reservasi->check_in }}</p>
    <p class="mb-2"><strong>Check-out:</strong> {{ $reservasi->check_out }}</p>
    <p class="mb-4"><strong>Total Harga:</strong> Rp {{ number_format($reservasi->total_harga) }}</p>

    <button id="pay-button" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
        Bayar Sekarang
    </button>

    <a href="{{ url()->previous() }}" class="inline-block ml-4 px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
        Kembali
    </a>
</div>

<script type="text/javascript">
    document.getElementById('pay-button').addEventListener('click', function () {
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                alert("Pembayaran berhasil!");
                console.log(result);
                window.location.href = "{{ route('user.dashboard') }}";
            },
            onPending: function(result){
                alert("Menunggu pembayaran selesai.");
                console.log(result);
            },
            onError: function(result){
                alert("Pembayaran gagal.");
                console.log(result);
            },
            onClose: function(){
                alert("Kamu menutup popup sebelum menyelesaikan pembayaran.");
            }
        });
    });
</script>
@endsection
