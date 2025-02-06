<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pustaka extends Model
{
    use HasFactory;

    protected $table = 'tbl_pustaka'; // Nama tabel
    protected $primaryKey = 'id_pustaka'; // Nama primary key
    public $timestamps = true; // Menggunakan timestamps

    protected $fillable = [
        'kode_pustaka',
        'id_ddc',
        'id_format',
        'id_penerbit',
        'id_pengarang',
        'isbn',
        'judul_pustaka',
        'tahun_terbit',
        'keyword',
        'keterangan_fisik',
        'keterangan_tambahan',
        'abstraksi',
        'gambar',
        'harga_buku',
        'kondisi_buku',
        'fp',
        'jml_pinjam',
        'denda_terlambat',
        'denda_hilang',
    ];

    /**
     * Relasi dengan tabel DDC
     */
    public function ddc()
    {
        return $this->belongsTo(DDC::class, 'id_ddc');
    }

    /**
     * Relasi dengan tabel Format
     */
    public function format()
    {
        return $this->belongsTo(Format::class, 'id_format');
    }

    /**
     * Relasi dengan tabel Penerbit
     */
    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'id_penerbit');
    }

    /**
     * Relasi dengan tabel Pengarang
     */
    public function pengarang()
    {
        return $this->belongsTo(Pengarang::class, 'id_pengarang');
    }
}
