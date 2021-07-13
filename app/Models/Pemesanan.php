<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = "pemesanan";

    protected $fillable = [
        'kendaraan_id',
        'peminjam_id',
        'supir_id',
        'tgl_pemesanan',
        'status'
    ];
}
