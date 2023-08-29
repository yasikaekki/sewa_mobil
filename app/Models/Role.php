<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_role',
    ];

    public function user(){
        return $this->hasMany('App\Models\User');
    }
    public function postcar(){
        return $this->hasMany('App\Models\PostCar');
    }
}
