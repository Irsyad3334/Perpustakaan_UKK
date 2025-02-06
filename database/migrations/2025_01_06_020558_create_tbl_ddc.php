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
        Schema::create('tbl_ddc', function (Blueprint $table) {
            $table->id('id_ddc'); // Auto-increment ID
            $table->unsignedBigInteger('id_rak'); // Foreign key reference
            $table->string('kode_ddc', 10);
            $table->string('ddc', 100);
            $table->string('keterangan', 50)->nullable();
            $table->timestamps();
            
            // Define Indexes
            $table->primary('id_ddc');
            $table->unique('kode_ddc');
            $table->unique('ddc');
            $table->index('id_rak', 'fk_id_rak_idx'); // Foreign key index

            // Define Foreign Key
            $table->foreign('id_rak')->references('id_rak')->on('tbl_rak')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_ddc');
    }
};
