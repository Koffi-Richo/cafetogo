<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class SuperadminSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Branch Head']);
        Role::create(['name' => 'Waiter']);
        Role::create(['name' => 'Chef']);

        $user  = User::create([
            'name' => 'Ulrich Koffi',
            'email' => 'superadmin@example.com',
            'password' => bcrypt(123456)
        ]);
        
        $user->assignRole('Super Admin');

        // $user2  = User::create([
        //     'name' => 'admin',
        //     'email' => 'koffiadmin@example.com',
        //     'password' => bcrypt(123456)
        // ]);
        
        // $user2->assignRole('Admin');

        // $user3  = User::create([
        //     'name' => 'head',
        //     'email' => 'koffihead@example.com',
        //     'password' => bcrypt(123456)
        // ]);
        
        // $user3->assignRole('Branch Head');

        // $user4  = User::create([
        //     'name' => 'waiter',
        //     'email' => 'koffiwaiter@example.com',
        //     'password' => bcrypt(123456)
        // ]);

        // $user4->assignRole('Waiter');

        // $user5  = User::create([
        //     'name' => 'chef',
        //     'email' => 'koffichef@example.com',
        //     'password' => bcrypt(123456)
        // ]);

        // $user5->assignRole('Chef');

    }

}
