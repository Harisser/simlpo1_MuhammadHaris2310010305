<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apotek extends Model
{
    use HasFactory;

    protected $table = 'apotek'; // nama tabel
    protected $primaryKey = 'id_apotek'; // primary key bukan id

    public $timestamps = false; // karena tabel tidak punya created_at & updated_at

    protected $fillable = [
        'nama_apotek',
        'alamat',
    ];

    // Relasi ke pengguna (opsional, tapi bagus)
    public function pengguna()
    {
        #return $this->hasMany(Pengguna::class, 'id_apotek', 'id_apotek');
    }

    // Relasi ke batch obat (opsional)
    public function batchObat()
    {
        #return $this->hasMany(BatchObat::class, 'id_apotek', 'id_apotek');
    }
}
