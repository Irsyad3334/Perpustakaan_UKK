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
        Schema::create('tbl_pengarang', function (Blueprint $table) {
            $table->id('id_pengarang'); // Auto-increment ID
            $table->string('kode_pengarang', 10);
            $table->string('gelar_depan', 10)->nullable();
            $table->string('nama_pengarang', 50);
            $table->string('gelar_belakang', 10)->nullable();
            $table->string('no_telp', 15)->nullable();
            $table->string('email', 30)->nullable();
            $table->string('website', 50)->nullable();
            $table->longText('biografi')->nullable();
            $table->string('keterangan', 50)->nullable();
            $table->timestamps();
            
            // Define Indexes
            $table->primary('id_pengarang');
            $table->unique('kode_pengarang');
            $table->unique('nama_pengarang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pengarang');
    }
};
