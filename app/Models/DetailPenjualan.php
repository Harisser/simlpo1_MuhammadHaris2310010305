<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    protected $table = 'detail_penjualan';
    protected $primaryKey = 'id_detail';

    protected $fillable = [
        'id_transaksi',
        'id_batch',
        'qty_jual',
        'harga_satuan'
    ];

    public function transaksi()
    {
        return $this->belongsTo(TransaksiPenjualan::class, 'id_transaksi');
    }

    public function batch()
    {
        return $this->belongsTo(BatchObat::class, 'id_batch');
    }
}

