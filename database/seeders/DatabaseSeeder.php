<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Packge;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Feature;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Tmohamed',
            'email' => 'mohamed@gmail.com',
            'password' => bcrypt('qazwsx123')
        ]);

        Feature::create([
            'image'                 => '<i class="fa-solid fa-plus"></i>',
            'route_name'            => 'feature1.index',
            'name'                  => 'Calculate sum',
            'description'           => 'Calculate sum of two numbers',
            'required_credits'      => 1,
            'active'                => true
        ]);


        Feature::create([
            'image'                 => '<i class="fa-solid fa-plus"></i>',
            'route_name'            => 'feature2.index',
            'name'                  => 'Calculate diffrance',
            'description'           => 'Calculate diffrance of two numbers',
            'required_credits'      => 3,
            'active'                => true
        ]);

        Packge::create([
            'name'      => 'Basic',
            'credits'   => 20,
            'price'      => 10,
        ]);

        Packge::create([
            'name'      => 'Silver',
            'credits'   => 100,
            'price'      => 25,
        ]);

        Packge::create([
            'name'      => 'basic',
            'credits'   => 60,
            'price'      => 300,
        ]);
    }
}
