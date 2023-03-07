<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\File;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        $fileName= Str::random(30);
        Storage::disk("public")->put("userPhotos/".$fileName, Http::timeout(30)-> get("https://picsum.photos/200/300"));
        //$image="/storage/app/public/userPhotos/".$fileName.".jpeg";
        $image=$fileName;
        return [
            'name' => fake('es_ES')->firstName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$j6RUs5I34SSQ5Yp1/E6LAu.biI.dn.1CheTSFmLB5lFLPBAPvXW5S', // password
            'remember_token' => Str::random(10),
            'surname' => fake('es_ES')->lastName(),
            'nick' => fake()->name(),
            'image' => $image,


        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
