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
        Schema::create('tbl_format', function (Blueprint $table) {
            $table->id('id_format'); // Auto-increment ID
            $table->string('kode_format', 20);
            $table->string('format', 25);
            $table->string('keterangan', 50)->nullable();
            $table->timestamps();
            
            // Define Indexes
            $table->primary('id_format');
            $table->unique('kode_format');
            $table->unique('format');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_format');
    }
};
