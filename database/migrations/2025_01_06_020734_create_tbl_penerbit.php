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
        Schema::create('tbl_penerbit', function (Blueprint $table) {
            $table->id('id_penerbit'); // Auto-increment ID
            $table->string('kode_penerbit', 10);
            $table->string('nama_penerbit', 50);
            $table->string('alamat_penerbit', 100)->nullable();
            $table->string('no_telp', 15)->nullable();
            $table->string('email', 30)->nullable();
            $table->string('fax', 15)->nullable();
            $table->string('website', 50)->nullable();
            $table->string('kontak', 50)->nullable();
            $table->timestamps();
            
            // Define Indexes
            $table->primary('id_penerbit');
            $table->unique('kode_penerbit');
            $table->unique('nama_penerbit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_penerbit');
    }
};
