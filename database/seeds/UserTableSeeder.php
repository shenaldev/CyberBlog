<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'username' => 'admin',
            'email' => 'admin@cyber.com',
            'password' => bcrypt('admin'),
            'admin' => 1
        ]);

        $profile = Profile::create([
            'avatar' => "",
            'full_name' => 'Admin Cyber',
            'about' => 'I\'m The Admin',
            'user_id' => $user->id
        ]);

        $user2 = User::create([
            'username' => 'Alen',
            'email' => 'alen@cyber.com',
            'password' => bcrypt('alen'),
            'admin' => 0
        ]);

        $profile2 = Profile::create([
            'avatar' => "",
            'full_name' => 'Alen Walker',
            'about' => 'I\'m The Alen',
            'user_id' => $user2->id
        ]);
    }
}
