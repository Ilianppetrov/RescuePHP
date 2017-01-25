<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user_role = App\Role::where('role', 'user')->first();
    	$user = new User();
    	$user->username = 'User';
    	$user->email = 'user@email.com';
    	$user->password = 'pass';
    	$user->remember_token = random_int(1, 5);
    	$user->save();
    	$user->roles()->attach($user_role);


    	$admin_role = App\Role::where('role', 'admin')->first();
    	$admin = new User();
    	$admin->username = 'Admin';
    	$admin->email = 'admin@email.com';
    	$admin->password = 'pass';
    	$admin->remember_token = random_int(1, 5);
    	$admin->save();
    	$admin->roles()->attach($admin_role);
    	
    }
}
