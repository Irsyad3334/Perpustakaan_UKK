<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang digunakan
    protected $table = 'tbl_format';

    // Tentukan nama kolom primary key yang digunakan
    protected $primaryKey = 'id_format';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'kode_format',
        'format',
        'keterangan',
    ];
}
