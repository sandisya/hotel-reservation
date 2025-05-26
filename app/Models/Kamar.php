<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $fillable = [
    'nomor_kamar',
    'tipe_kamar',
    'harga_per_malam',
    'status',
    'gambar',  // <-- tambahkan ini
];
    public function reservasis()
{
    return $this->hasMany(Reservasi::class);
}

}
