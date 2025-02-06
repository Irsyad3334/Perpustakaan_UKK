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
        Schema::create('tbl_rak', function (Blueprint $table) {
            $table->id('id_rak'); // Auto-increment ID
            $table->string('kode_rak', 10);
            $table->string('rak', 25);
            $table->string('keterangan', 50)->nullable();
            $table->timestamps();
            
            // Define Indexes
            $table->primary('id_rak');
            $table->unique('kode_rak');
            $table->unique('rak');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_rak');
    }
};
