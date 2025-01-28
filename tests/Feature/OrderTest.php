<?php

namespace Tests\Feature;

use App\Actions\Shop\AddProductToCart;
use App\Actions\Shop\CreateOrder;
use App\Actions\Shop\RemoveProductFromCart;
use App\Factories\CartFactory;
use App\Models\Product;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_createOrder(): void
    {
        $this->seed([
            ProductSeeder::class,
        ]);

        $cart = CartFactory::make();

        $addAction = new AddProductToCart();
        $createOrderAction = new CreateOrder();

        $products = Product::all();

        $addAction->add($products[0]->id, 3);
        $addAction->add($products[1]->id, 2);

        $this->assertDatabaseHas('cart_items', [
            'cart_id' => $cart->id,
            'product_id' => $products[0]->id,
            'quantity' => 3,
        ]);

        $email = $this->faker->email;
        $phone = $this->faker->phoneNumber;
        $shippingAddress = $this->faker->address;
        $status = $this->faker->randomElement(['pending', 'processing', 'completed']);
        $name = $this->faker->name;
        $shippingMethod = 'nova_post';

        $createOrderAction->create([
            'email' => $email,
            'phone' => $phone,
            'shippingAddress' => $shippingAddress,
            'status' => $status,
            'name' => $name,
            'shippingMethod' => $shippingMethod,
        ]);

        $this->assertDatabaseEmpty('carts');
        $this->assertDatabaseEmpty('cart_items');
        $this->assertDatabaseCount('orders', 1);
        $this->assertDatabaseCount('order_items', 2);
    }
}
