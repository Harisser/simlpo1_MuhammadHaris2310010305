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
        Schema::create('batch_obat', function (Blueprint $table) {
            $table->id('id_batch');

            $table->unsignedBigInteger('id_obat');
            $table->unsignedBigInteger('id_apotek');

            $table->string('kode_batch', 50);
            $table->date('expiry_date');
            $table->integer('qty_stok');

            $table->timestamps();

            $table->foreign('id_obat')
                ->references('id_obat')
                ->on('obat')
                ->cascadeOnDelete();

            $table->foreign('id_apotek')
                ->references('id_apotek')
                ->on('apotek')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_obat');
    }
};
