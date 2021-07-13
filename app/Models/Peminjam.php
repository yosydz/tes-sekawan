<?php

namespace App\Models;

use App\Models\Kegiatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjam extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'peminjam';

    protected $fillable = [
        'nama',
        'email',
        'jabatan',
        'umur'
    ];

    /**
    * The primary key for the model.
    *
    * @var string
    */

}
