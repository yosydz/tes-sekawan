<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = "kendaraan";
    protected $fillable = [
        'nama',
        'jenis_bbm',
        'avg_bbm',
        'tgl_service',
        'tgl_dipakai',
        'pemilik',
        'status'
    ];
}
