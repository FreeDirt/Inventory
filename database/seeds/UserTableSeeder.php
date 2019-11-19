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
        $role_author = Role::where('name', 'Author')->first();
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

        $author = new User();
        $author->name = 'Author';
        $author->email = 'test08@acc.dr-klippe.de';
        $author->password = bcrypt('author');
        $author->save();
        $author->roles()->attach($role_author);
    }
}
