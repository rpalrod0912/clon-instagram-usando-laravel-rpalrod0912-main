<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //Creamos 10 usuarios de instagram
        \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'nick' => 'admin',
            'email' => 'admin@admin.es',
            'password' => bcrypt('admin')
        ]);

        $user = \App\Models\User::factory()->create();
        $image = \App\Models\Image::factory()->for($user)->create();
        \App\Models\Like::factory(40)->for($image)->for($user)->create();
        \App\Models\Comment::factory(4)->for($image)->for($user)->create();
    }
}
