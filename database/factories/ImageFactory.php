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
                    'products/product-blueberries.png',
                    'products/product-cherries.png',
                    'products/product-cinnamon.png',
                    'products/product-lavander.png',
                    'products/product-lemon.png',
                    'products/product-mint.png',
                    'products/product-orange.png',
                    'products/product-straweberry.png',
                ]),
            'type' => ImageType::GALLERY
        ];
    }
}
