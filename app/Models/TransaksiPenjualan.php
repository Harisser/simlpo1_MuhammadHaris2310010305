<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    protected $table = 'transaksi_penjualan';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'tgl_transaksi',
        'id_kasir',
        'total_bayar',
        'diskon'
    ];

    public function kasir()
    {
        return $this->belongsTo(User::class, 'id_kasir');
    }

    public function detail()
    {
        return $this->hasMany(DetailPenjualan::class, 'id_transaksi');
    }
}
