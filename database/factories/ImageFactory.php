<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\File;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $fileName= Str::random(30);
        Storage::disk("public")->put("images/".$fileName, Http::timeout(30)-> get("https://picsum.photos/200/300"));
        //$image="/storage/app/public/userPhotos/".$fileName.".jpeg";
        $image=$fileName;
        return [
            'image_path' => $image,
            'description' => fake()->paragraph()
        ];
    }
}
