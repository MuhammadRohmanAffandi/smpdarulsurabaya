<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPembayaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_siswa',
        'bukti_pembayaran',
        'telah_dikonfirmasi'
    ];
}
