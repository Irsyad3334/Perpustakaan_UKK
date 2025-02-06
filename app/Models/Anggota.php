<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'tbl_anggota'; // Nama tabel
    protected $primaryKey = 'id_anggota'; // Primary key
    public $incrementing = true; // ID auto-increment
    protected $keyType = 'int'; // Tipe data primary key

    protected $fillable = [
        'id_jenis_anggota',
        'kode_anggota',
        'nama_anggota',
        'tempat',
        'tgl_lahir',
        'alamat',
        'no_telp',
        'email',
        'tgl_daftar',
        'masa_aktif',
        'fa',
        'keterangan',
        'foto',
        'username',
        'password', // Ensure this column has sufficient length in the database
    ];

    public function jenisAnggota()
    {
        return $this->belongsTo(JenisAnggota::class, 'id_jenis_anggota');
    }
}
