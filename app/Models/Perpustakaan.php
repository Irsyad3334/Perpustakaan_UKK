<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perpustakaan extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan
    protected $table = 'tbl_perpustakaan'; 

    // Menentukan kolom primary key yang digunakan oleh tabel
    protected $primaryKey = 'id_perpustakaan'; 

    // Menentukan apakah primary key adalah auto-increment (defaultnya true)
    public $incrementing = true;

    // Tentukan tipe data primary key jika bukan integer (defaultnya integer)
    protected $keyType = 'int';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'nama_perpustakaan', 
        'nama_pustakawan',
        'alamat',
        'email',
        'website',
        'no_telp',
        'keterangan',
    ];
}
