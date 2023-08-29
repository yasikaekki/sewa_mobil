<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCar extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'foto_profil',
        'no_kendaraan',
        'no_stnk',
    ];

    public function user(){
        return $this->hasMany('App\Models\User');
    }

    public function role(){
        return $this->belongsTo('App\Models\Role');
    }
}
