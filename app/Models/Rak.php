<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    use HasFactory;

    protected $table = 'tbl_rak';  // Nama tabel yang digunakan
    protected $primaryKey = 'id_rak';  // Nama primary key
    public $timestamps = true;  // Menyimpan waktu update dan create

    // Definisikan kolom yang dapat diisi
    protected $fillable = [
        'kode_rak',
        'rak',
        'keterangan',
    ];
}
