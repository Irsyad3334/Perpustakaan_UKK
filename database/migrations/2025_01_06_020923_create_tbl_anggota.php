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
        Schema::create('tbl_anggota', function (Blueprint $table) {
            $table->id('id_anggota'); // Auto-increment ID
            $table->unsignedBigInteger('id_jenis_anggota');
            $table->string('kode_anggota', 20);
            $table->string('nama_anggota', 50);
            $table->string('tempat', 20);
            $table->date('tgl_lahir');
            $table->string('alamat', 50);
            $table->string('no_telp', 15);
            $table->string('email', 30)->nullable();
            $table->date('tgl_daftar');
            $table->date('masa_aktif');
            $table->enum('fa', ['Y', 'T']);
            $table->string('keterangan', 45)->nullable();
            $table->longText('foto')->nullable();
            $table->string('username', 255);
            $table->string('password', 255);
            $table->timestamps();

            // Define Indexes
            $table->primary('id_anggota');
            $table->unique('kode_anggota');
            $table->unique('nama_anggota');
            $table->unique('username');
            $table->index('id_jenis_anggota', 'fk_id_jenis_anggota_idx');

            // Define Foreign Key
            $table->foreign('id_jenis_anggota')->references('id_jenis_anggota')->on('tbl_jenis_anggota')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_anggota');
    }
};
