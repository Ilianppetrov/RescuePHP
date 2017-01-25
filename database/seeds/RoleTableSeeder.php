<?php


use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_role = new Role();
        $user_role->role = 'user';
        $user_role->save();

        $admin_role = new Role();
        $admin_role->role = 'admin';
        $admin_role->save(); 
    }
}
