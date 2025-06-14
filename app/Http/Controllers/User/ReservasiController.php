<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Kamar;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Midtrans\Config;
use Midtrans\Snap;

class ReservasiController extends Controller
{
    public function index()
    {
        $kamars = Kamar::where('status', 'tersedia')->get();
        $reservasis = Reservasi::where('user_id', Auth::id())->get();

        return view('user.reservasi', compact('kamars', 'reservasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kamar_id' => 'required|exists:kamars,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        $kamar = Kamar::findOrFail($request->kamar_id);
        $checkIn = Carbon::parse($request->check_in);
        $checkOut = Carbon::parse($request->check_out);
        $durasi = $checkIn->diffInDays($checkOut);
        $totalHarga = $durasi * $kamar->harga_per_malam;
        $orderId = uniqid('ORDER-');

        $reservasi = Reservasi::create([
            'user_id' => Auth::id(),
            'kamar_id' => $kamar->id,
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'total_harga' => $totalHarga,
            'status' => 'dipesan',
            'order_id' => $orderId,
        ]);

        $kamar->update(['status' => 'dipesan']);

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $totalHarga,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);
        $reservasi->snap_token = $snapToken;
        $reservasi->save();

        return redirect()->route('user.bayar', ['id' => $reservasi->id]);
    }

    public function bayar($id)
    {
        $reservasi = Reservasi::findOrFail($id);

        if (!$reservasi->snap_token) {
            Config::$serverKey = config('midtrans.server_key');
            Config::$isProduction = config('midtrans.is_production');
            Config::$isSanitized = config('midtrans.is_sanitized');
            Config::$is3ds = config('midtrans.is_3ds');

            $params = [
                'transaction_details' => [
                    'order_id' => $reservasi->order_id,
                    'gross_amount' => $reservasi->total_harga,
                ],
                'customer_details' => [
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                ],
            ];

            $snapToken = Snap::getSnapToken($params);
            $reservasi->snap_token = $snapToken;
            $reservasi->save();
        }

        return view('user.bayar', [
            'reservasi' => $reservasi,
            'snapToken' => $reservasi->snap_token
        ]);
    }
}
