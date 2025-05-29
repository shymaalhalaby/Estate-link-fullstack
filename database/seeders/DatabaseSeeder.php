<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Estate;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */


public function run(): void
{
    $imageDirectory = public_path('storage/estates');
    $imageFiles = \Illuminate\Support\Facades\File::exists($imageDirectory) ? \Illuminate\Support\Facades\File::files($imageDirectory) : [];

    // Create owners with estates and assign images from disk
    User::factory()
        ->count(15)
        ->state(['role' => 'owner'])
        ->has(
            Estate::factory()->count(3)->state(function () use ($imageFiles) {
                $faker = \Faker\Factory::create();
                $randomImage = count($imageFiles) > 0 ? basename($faker->randomElement($imageFiles)) : null;
                return [
                    'image_path' => $randomImage ? "storage/estates/{$randomImage}" : null,
                ];
            })
        )
        ->create();

    // Create customers without estates
    User::factory()
        ->count(5)
        ->state(['role' => 'customer'])
        ->create();
}



}
