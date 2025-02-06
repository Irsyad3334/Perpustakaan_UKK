<?php

// app/Models/Pengarang.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengarang extends Model
{
    use HasFactory;

    protected $table = 'tbl_pengarang'; // Nama tabel
    protected $primaryKey = 'id_pengarang'; // Primary key
    protected $fillable = [
        'kode_pengarang',
        'gelar_depan',
        'nama_pengarang',
        'gelar_belakang',
        'no_telp',
        'email',
        'website',
        'biografi',
        'keterangan',
    ];
}
