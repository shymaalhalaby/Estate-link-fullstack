<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Estate;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class EstateSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $titles = [
            'Elegant 3-Bedroom House', 'Spacious Family Villa', 'Modern Duplex', 'Cozy Cottage with Garden',
            'Luxury Home with Private Pool', 'Contemporary House', 'Affordable Home in Quiet Neighborhood',
            'Brand New Villa with Garage', 'Fully Furnished House for Rent', 'Bright 2-Bedroom Home',
            'Family-Friendly Rental', 'Renovated House with Balcony', 'Charming Home with Backyard',
            'Small House Ideal for Couples', 'Monthly Rental – Spacious Home', 'Retail Storefront in Prime Location',
            'Investment Opportunity: Store', 'Ground Floor Commercial Space', 'Boutique Store for Sale',
            'Storefront Near Mall', 'Two-Level Shop in Busy Area', 'Modern Retail Space for Rent',
            'Small Store Ideal for Bakery', 'Rentable Shop Near School', 'Newly Renovated Retail Space',
            'Compact Store in Residential Area', 'Spacious Shop on Main Road', 'Ready-to-Use Store',
            'Affordable Shop for Rent', 'Commercial Unit Near Bus Station'
        ];

        $addresses = ['Shaalan', 'Hamra', 'Salhieh', 'Aldahya'];
        $types = ['sell', 'rent'];

        // Get all users with role 'owner'
        $owners = User::where('role', 'owner')->get();

        
        $imageDirectory = public_path('storage/estates');
        $imageFiles = File::exists($imageDirectory) ? File::files($imageDirectory) : [];

        foreach ($titles as $title) {
            $owner = $owners->random();

            $randomImage = count($imageFiles) > 0 ? basename($faker->randomElement($imageFiles)) : null;

            Estate::create([
                'user_id' => $owner->id,
                'title' => $title,
                'address' => $faker->randomElement($addresses),
                'type' => $faker->randomElement($types),
                'price' => $faker->numberBetween(50000, 500000),
                'description' => $faker->paragraph(3),
                'image_path' => $randomImage ? "storage/estates/{$randomImage}" : null,
            ]);
        }
    }
}
