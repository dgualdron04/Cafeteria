<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'SuperAdmin'
            ], 
            [
                'name' => 'Coordinador'
            ], 
            [
                'name' => 'Tendero'
            ], 
        ];

        foreach ($roles as $rol) {
            Role::insert($rol);
        }
    }
}
