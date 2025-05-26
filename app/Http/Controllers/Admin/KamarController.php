<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kamar;

class KamarController extends Controller
{
    public function index()
    {
        $kamars = Kamar::all();
        return view('admin.kamar.index', compact('kamars'));
    }

    public function create()
    {
        return view('admin.kamar.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nomor_kamar' => 'required',
        'tipe_kamar' => 'required',
        'harga_per_malam' => 'required|numeric',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('gambar')) {
    $imageName = time() . '.' . $request->gambar->extension();
    $request->gambar->move(public_path('img'), $imageName);
} else {
    $imageName = null;
}


    Kamar::create([
        'nomor_kamar' => $request->nomor_kamar,
        'tipe_kamar' => $request->tipe_kamar,
        'harga_per_malam' => $request->harga_per_malam,
        'gambar' => $imageName,
        'status' => 'tersedia', // default misal
    ]);

    return redirect()->route('kamar.index')->with('success', 'Kamar berhasil ditambahkan.');
}

    public function edit(Kamar $kamar)
    {
        return view('admin.kamar.edit', compact('kamar'));
    }

    public function update(Request $request, Kamar $kamar)
{
    $request->validate([
        'nomor_kamar' => 'required|unique:kamars,nomor_kamar,' . $kamar->id,
        'tipe_kamar' => 'required',
        'harga_per_malam' => 'required|numeric',
        'status' => 'required|in:tersedia,dipesan',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $data = $request->only(['nomor_kamar', 'tipe_kamar', 'harga_per_malam', 'status']);

    if ($request->hasFile('gambar')) {
        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('img'), $imageName);
        $data['gambar'] = $imageName;

        // Optional: Hapus gambar lama jika ada
        if ($kamar->gambar && file_exists(public_path('img/' . $kamar->gambar))) {
            unlink(public_path('img/' . $kamar->gambar));
        }
    }

    $kamar->update($data);

    return redirect()->route('kamar.index')->with('success', 'Kamar berhasil diperbarui.');
}

    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil dihapus.');
    }
}
