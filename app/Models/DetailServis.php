<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailServis extends Model
{
    use HasFactory;

    protected $table = "detail_servis";

    protected $fillable = [
        'id',
        'perbaikan_servis_id',
        'tanggal_input',
        'kerusakan_servis',
    ];

    public function repair(){
        return $this->hasMany(Repair::class, 'perbaikan_servis_id', 'id');
    }
}
