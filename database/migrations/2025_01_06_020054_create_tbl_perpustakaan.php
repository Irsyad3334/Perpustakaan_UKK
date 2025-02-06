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
        Schema::create('tbl_perpustakaan', function (Blueprint $table) {
            $table->id('id_perpustakaan'); // Auto-increment ID
            $table->string('nama_perpustakaan', 50);
            $table->string('nama_pustakawan', 50);
            $table->string('alamat', 50);
            $table->string('email', 50);
            $table->string('website', 50)->nullable();
            $table->string('no_telp', 15);
            $table->string('keterangan', 50)->nullable();
            $table->timestamps();
            
            // Define Indexes
            $table->primary('id_perpustakaan');
            $table->unique('nama_perpustakaan');
            $table->unique('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_perpustakaan');
    }
};
