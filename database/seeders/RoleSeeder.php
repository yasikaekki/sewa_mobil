<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Auth;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = new Role;  
        $role->jenis_role = "User";
        $role->created_at = \Carbon\Carbon::now();
        $role->updated_at = \Carbon\Carbon::now();
        $role->save();
        $role = new Role;            
        $role->jenis_role = "Seller";
        $role->created_at = \Carbon\Carbon::now();
        $role->updated_at = \Carbon\Carbon::now();
        $role->save();
        $role = new Role;            
        $role->jenis_role = "Admin";
        $role->created_at = \Carbon\Carbon::now();
        $role->updated_at = \Carbon\Carbon::now();
        $role->save();
    }
}
