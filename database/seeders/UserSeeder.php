<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
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
        User::create([
            'name' => 'Diego Andrés Gualdrón Angarita',
            'email' => 'dgualdron04@gmail.com',
            'password' => bcrypt('12345678')
        ])->roles()->attach(3);

    }
}
