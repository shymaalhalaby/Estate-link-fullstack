<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estate>
 */
class EstateFactory extends Factory
{
    public function definition(): array
    {
        $addresses = ['Shaalan', 'Hamra', 'Salhieh', 'Aldahya'];
        $types = ['sell', 'rent'];

        // Titles without address (you can add more)
        $titles = [
            "Elegant 3-Bedroom House", "Spacious Family Villa", "Modern Duplex", "Cozy Cottage with Garden",
            "Luxury Home with Private Pool", "Contemporary House", "Affordable Home in Quiet Neighborhood",
            "Brand New Villa with Garage", "Fully Furnished House for Rent", "Bright 2-Bedroom Home",
            "Family-Friendly Rental", "Renovated House with Balcony", "Charming Home with Backyard",
            "Small House Ideal for Couples", "Monthly Rental – Spacious Home", "Retail Storefront in Prime Location",
            "Investment Opportunity: Store", "Ground Floor Commercial Space", "Boutique Store for Sale",
            "Storefront Near Mall", "Two-Level Shop in Busy Area", "Modern Retail Space for Rent",
            "Small Store Ideal for Bakery", "Rentable Shop Near School", "Newly Renovated Retail Space",
            "Compact Store in Residential Area", "Spacious Shop on Main Road", "Ready-to-Use Store",
            "Affordable Shop for Rent", "Commercial Unit Near Bus Station"
        ];

        return [
            'user_id' => User::factory()->state(['role' => 'owner']),
            'title' => $this->faker->randomElement($titles),
            'address' => $this->faker->randomElement($addresses),
            'type' => $this->faker->randomElement($types),
            'price' => $this->faker->numberBetween(50000, 500000),
            'description' => $this->faker->paragraph(3),
            'image_path' => null,
        ];
    }
}
