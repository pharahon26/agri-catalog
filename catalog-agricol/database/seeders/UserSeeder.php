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
                'description' => 'C\'est sucrée',
                'user_id' => $user->id,
            ]);
            Category::factory()->create([
                'name' => 'Céréales',
                'description' => 'Des grains',
                'user_id' => $user->id,
            ]);
            Category::factory()->create([
                'name' => 'Légumes',
                'description' => 'Les trucs vert',
                'user_id' => $user->id,
            ]);
            Category::factory()->create([
                'name' => 'Fleurs',
                'description' => 'C\'est beau',
                'user_id' => $user->id,
            ]);

        });

        User::factory(3)->create();
    }
}
