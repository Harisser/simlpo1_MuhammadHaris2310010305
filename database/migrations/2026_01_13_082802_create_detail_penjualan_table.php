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
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->id('id_detail');

            $table->unsignedBigInteger('id_transaksi');
            $table->unsignedBigInteger('id_batch');

            $table->integer('qty_jual');
            $table->decimal('harga_satuan', 10, 2);

            $table->timestamps();

            $table->foreign('id_transaksi')
                ->references('id_transaksi')
                ->on('transaksi_penjualan')
                ->cascadeOnDelete();

            $table->foreign('id_batch')
                ->references('id_batch')
                ->on('batch_obat')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualan');
    }
};
