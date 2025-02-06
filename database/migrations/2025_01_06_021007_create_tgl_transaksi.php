<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tgl_transaksi', function (Blueprint $table) {
            $table->id('id_transaksi'); // Auto-increment ID
            $table->unsignedBigInteger('id_pustaka');
            $table->unsignedBigInteger('id_anggota');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->date('tgl_pengembalian')->nullable();
            $table->enum('fp', ['0', '1']);
            $table->string('keterangan', 50)->nullable();
            $table->timestamps();

            // Define Indexes
            $table->primary('id_transaksi');
            $table->index('id_pustaka', 'fk_id_pustaka_idx');
            $table->index('id_anggota', 'fk_id_anggota_idx');

            // Define Foreign Keys
            $table->foreign('id_pustaka')->references('id_pustaka')->on('tbl_pustaka')->onDelete('cascade');
            $table->foreign('id_anggota')->references('id_anggota')->on('tbl_anggota')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tgl_transaksi');
    }
};
