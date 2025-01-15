<?php

namespace Database\Factories;

use App\Enums\ImageType;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            'path' => $this
                ->faker
                ->randomElement([
                    'assets/product-blueberries.png',
                    'assets/product-cherries.png',
                    'assets/product-cinnamon.png',
                    'assets/product-lavander.png',
                    'assets/product-lemon.png',
                    'assets/product-mint.png',
                    'assets/product-orange.png',
                    'assets/product-straweberry.png',
                ]),
            'type' => ImageType::GALLERY
        ];
    }
}
