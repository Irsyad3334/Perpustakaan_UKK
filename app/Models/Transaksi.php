<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'tgl_transaksi';

    // Primary key tabel
    protected $primaryKey = 'id_transaksi';

    // Kolom-kolom yang dapat diisi (mass-assignable)
    protected $fillable = [
        'id_pustaka',
        'id_anggota',
        'tgl_pinjam',
        'tgl_kembali',
        'tgl_pengembalian',
        'fp',
        'keterangan',
    ];

    /**
     * Relasi ke tabel Pustaka.
     * id_pustaka adalah foreign key di tabel tgl_transaksi yang mengacu ke tabel tbl_pustaka.
     */
    public function pustaka()
    {
        return $this->belongsTo(Pustaka::class, 'id_pustaka', 'id_pustaka');
    }

    /**
     * Relasi ke tabel Anggota.
     * id_anggota adalah foreign key di tabel tgl_transaksi yang mengacu ke tabel tbl_anggota.
     */
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota', 'id_anggota');
    }

    /**
     * Scope untuk mendapatkan transaksi yang masih dalam status "belum kembali".
     */
    public function scopeBelumKembali($query)
    {
        return $query->whereNull('tgl_pengembalian');
    }

    /**
     * Scope untuk mendapatkan transaksi dengan status "sudah kembali".
     */
    public function scopeSudahKembali($query)
    {
        return $query->whereNotNull('tgl_pengembalian');
    }
}
