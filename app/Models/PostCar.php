<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCar extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'role_id',
        'harga',
        'no_kendaraan',
        'no_stnk',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function role(){
        return $this->belongsTo('App\Models\Role');
    }
}
