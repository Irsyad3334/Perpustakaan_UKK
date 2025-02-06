<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ddc extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang digunakan
    protected $table = 'tbl_ddc';

    // Tentukan nama kolom primary key yang digunakan
    protected $primaryKey = 'id_ddc';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'id_rak',
        'kode_ddc',
        'ddc',
        'keterangan',
    ];

    // Relasi dengan tabel rak
    public function rak()
    {
        return $this->belongsTo(Rak::class, 'id_rak');
    }
}
