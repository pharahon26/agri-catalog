<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use App\Models\Category;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'switcher',
            'email' => 'switcher@switch.com',
        ])->each(function ($user){
            Category::factory()->create([
                'name' => 'Fruits',
                'user_id' => $user->id,
            ]);
            Category::factory()->create([
                'name' => 'Céréales',
                'user_id' => $user->id,
            ]);
            Category::factory()->create([
                'name' => 'Légumes',
                'user_id' => $user->id,
            ]);
            Category::factory()->create([
                'name' => 'Fleurs',
                'user_id' => $user->id,
            ]);

        });

        User::factory(3)->create();
    }
}
