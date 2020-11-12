<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=User::create([
            'name' => 'super_admin',
            'email' => 'super_admin@admins.com',
            'password' => bcrypt('password'),
        ]);
        $admin->attachRole('super_admin');
    }
}
