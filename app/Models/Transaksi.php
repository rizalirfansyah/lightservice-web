<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = "transaksi";

    protected $fillable = [
        'id',
        'pelanggan_id',
        'perbaikan_id',
        'tgl_transaksi',
        'harga',
        'status_transaksi',
        'created_at',
        'updated_at'
    ];

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'id');
    }

    public function repair(){
        return $this->belongsTo(Repair::class, 'perbaikan_id', 'id');
    }
}