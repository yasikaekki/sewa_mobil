<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User; 
        $user->role_id = 2;           
        $user->name = "Admin";
        $user->email = "admin@gmail.com";
        $user->telepon = "+621243";
        $user->alamat = "adaffa";
        $user->no_sim = 1111;
        $user->no_npwp = 1213;
        $user->password = Hash::make('12345678');
        $user->created_at = \Carbon\Carbon::now();
        $user->updated_at = \Carbon\Carbon::now();
        $user->save();
    }
}