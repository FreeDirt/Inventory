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
        $role_user = Role::where('name', 'User')->first();
        $role_moderator = Role::where('name', 'Moderator')->first();
        $role_admin = Role::where('name', 'Admin')->first();
        
        $user = new User();
        $user->name = 'Visitor';
        $user->email = 'test09@acc.dr-klippe.de';
        $user->password = bcrypt('visitor');
        $user->save();
        $user->roles()->attach($role_user);

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'r.mendoza@acc.dr-klippe.de';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $admin2 = new User();
        $admin2->name = 'adavid';
        $admin2->email = 'ict.admin02@acc.dr-klippe.de';
        $admin2->password = bcrypt('Pa12wo34!');
        $admin2->save();
        $admin2->roles()->attach($role_admin);

        $moderator = new User();
        $moderator->name = 'Moderator';
        $moderator->email = 'test08@acc.dr-klippe.de';
        $moderator->password = bcrypt('Moderator');
        $moderator->save();
        $moderator->roles()->attach($role_moderator);
    }
}
