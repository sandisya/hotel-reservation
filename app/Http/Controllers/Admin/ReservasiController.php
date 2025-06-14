<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasis = Reservasi::with('user', 'kamar')->get();
        return view('admin.reservasi.index', compact('reservasis'));
    }

    public function validasi(Request $request, $id)
    {
        $request->validate([
            'status_validasi' => 'required|in:disetujui,ditolak',
        ]);

        $reservasi = Reservasi::findOrFail($id);
        $reservasi->status_validasi = $request->status_validasi;
        $reservasi->save();

        return redirect()->back()->with('success', 'Status reservasi diperbarui!');
    }
}
