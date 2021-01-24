<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();
        
        $user = new User();
        $user->name = 'usuario';
        $user->email = 'usuario@ejemplo.com';
        $user->password = bcrypt('123456');
        $user->save();
        
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@ejemplo.com';
        $user->password = bcrypt('123456');
        $user->save();
        
        $user->roles()->attach($role_admin);
    }
}
