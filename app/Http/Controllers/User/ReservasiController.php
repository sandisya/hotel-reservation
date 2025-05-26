<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Kamar;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

        // Simpan reservasi
        Reservasi::create([
            'user_id' => Auth::id(),
            'kamar_id' => $kamar->id,
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'total_harga' => $totalHarga,
            'status' => 'dipesan',
        ]);

        // Update status kamar
        $kamar->update(['status' => 'dipesan']);

        return back()->with('success', 'Reservasi berhasil dibuat.');
    }
}
