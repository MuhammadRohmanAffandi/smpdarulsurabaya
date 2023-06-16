<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonSiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nisn',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'file_path_pas_foto',
        'file_path_kk',
        'rt',
        'rw',
        'desa',
        'kecamatan',
        'kabupaten',
        'no_telp',
        'nama_sekolah',
        'file_path_ijasah',
        'tahun_lulus',
        'code_pendaftaran',
        'status',
        'bukti_pembayaran'
    ];
}
