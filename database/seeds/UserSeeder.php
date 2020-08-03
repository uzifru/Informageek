<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::create([
            'name' => 'Admin',
            'email' => 'admin@informageek.tech',
            'password' => bcrypt('123456'),
            'username' => 'admin'
        
        ]);
        $superadmin->assignRole('admin');

        $admin = User::create([
            'name' => 'User',
            'email' => 'user@informageek.tech',
            'password' => bcrypt('123456'),
            'username' => 'user1',
        ]);
        $admin->assignRole('user');

        $user = User::create([
            'name' => 'UserPlus',
            'email' => 'userplus@informageek.tech',
            'password' => bcrypt('123456'),
            'username' => 'user2',
        ]);

        $user->assignRole('userplus');
    }
}
