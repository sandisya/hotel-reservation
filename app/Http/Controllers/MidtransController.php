<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function callback(Request $request)
    {
        $notif = new Notification();

        $transaction = $notif->transaction_status;
        $orderId = $notif->order_id;

        $reservasi = Reservasi::where('order_id', $orderId)->first();

        if ($reservasi) {
            $reservasi->status_pembayaran = $transaction;

            if ($transaction === 'settlement') {
                $reservasi->status = 'selesai';
                $reservasi->status_validasi = 'disetujui';
            } elseif (in_array($transaction, ['expire', 'cancel', 'deny'])) {
                $reservasi->status = 'dibatalkan';
                $reservasi->status_validasi = 'ditolak';
            }

            $reservasi->save();
        }

        return response()->json(['message' => 'Notifikasi diproses'], 200);
    }
}
