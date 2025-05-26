<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'kamar_id',
        'check_in',
        'check_out',
        'total_harga',
        'status',
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}

public function kamar()
{
    return $this->belongsTo(Kamar::class);
}

}
