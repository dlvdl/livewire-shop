<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this
                ->faker
                ->unique()
                ->randomElement([
                    'Spiced Mint',
                    'Sweet Straweberry',
                    'Juicy Lemon',
                    'Cool Blueberries',
                    'Fragrant Cinnamon',
                    'Summer Cherries',
                    'Clean Lavander',
                    'Fresh Orange'
                ]),
            'description' => json_encode(
                [
                    'Wax' => 'Top grade Soy wax that delivers a smoke less,  consistent burn',
                    'Fragrance' => 'Premium quality ingredients with natural essential oils',
                    'Burning Time' => '70-75 hours',
                    'Dimension' => '10cm x 5cm',
                    'Weight' => '400g '
                ]
            ),
            'price' => $this
                ->faker
                ->numberBetween(5_00, 45_00),
        ];
    }
}
