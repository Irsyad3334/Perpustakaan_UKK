<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisAnggota extends Model
{
    use HasFactory;

    protected $table = 'tbl_jenis_anggota'; // Nama tabel
    protected $primaryKey = 'id_jenis_anggota'; // Primary key
    public $incrementing = true; // ID auto-increment
    protected $keyType = 'int'; // Tipe data primary key

    protected $fillable = [
        'kode_jenis_anggota',
        'jenis_anggota',
        'max_pinjam',
        'keterangan',
    ];
}
