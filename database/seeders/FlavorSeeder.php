<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Flavor;

class FlavorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $flavors = [
            [
                'name' => 'Dulce'
            ], 
            [
                'name' => 'Salado'
            ], 
            [
                'name' => 'Ácido'
            ], 
            [
                'name' => 'Amargo'
            ], 
            [
                'name' => 'Umami'
            ]
        ];

        foreach ($flavors as $flavor) {
            Flavor::insert($flavor);
        }
    }
}
