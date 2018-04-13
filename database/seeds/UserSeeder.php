<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "User Seeding...\n";
        $u = new User;
        $u->role = "admin";
        $u->name = "hasan";
        $u->email = "hasan@dev.com";
        $u->password = bcrypt('123456');
        $u->save();
        $u = new User;
        $u->role = "admin";
        $u->name = "rabin";
        $u->email = "hasan@user.com";
        $u->password = bcrypt('123456');
        $u->save();

        User::create([
            'role' => 'admin',
            'name' => 'safiq',
            'email' => 'safiq@dev.com',
            'password' => bcrypt('123456')
        ]);

        User::create([
            'role' => 'admin',
            'name' => 'ratan',
            'email' => 'ratan@dev.com',
            'password' => bcrypt('123456')
        ]);

        User::create([
            'role' => 'admin',
            'name' => 'jabbar',
            'email' => 'jabbar@dev.com',
            'password' => bcrypt('123456')
        ]);
        echo "User Seeded, admin\n";
    }
}
