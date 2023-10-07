<?php

namespace App\Models;

use App\Http\Controllers\RepairController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = "pelanggan";

    protected $fillable = [
        'id',
        'kode_pelanggan',
        'nama_pelanggan',
        'email',
        'notelp',
        'alamat',
    ];

    public function repair(){
        return $this->hasMany(Repair::class, 'id', 'pelanggan_id');
    }

    public function transaksi(){
        return $this->hasMany(Transaksi::class, 'id', 'pelanggan_id');
    }
    
}