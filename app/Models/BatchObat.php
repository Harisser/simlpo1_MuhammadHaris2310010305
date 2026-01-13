<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatchObat extends Model
{
    protected $table = 'batch_obat';
    protected $primaryKey = 'id_batch';

    protected $fillable = [
        'id_obat',
        'id_apotek',
        'kode_batch',
        'expiry_date',
        'qty_stok'
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }

    public function apotek()
    {
        return $this->belongsTo(Apotek::class, 'id_apotek');
    }

    public function penjualanDetail()
    {
        return $this->hasMany(DetailPenjualan::class, 'id_batch');
    }

}

