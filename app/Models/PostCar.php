<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCar extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'harga',
        'nama_kendaraan',
        'no_kendaraan',
        'no_stnk',
        'status',
        'masa_awal',
        'masa_akhir',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
