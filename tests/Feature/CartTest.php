<?php

namespace Tests\Feature;

use App\Actions\Shop\AddProductToCart;
use App\Actions\Shop\RemoveProductFromCart;
use App\Factories\CartFactory;
use App\Models\CartItem;
use App\Models\Product;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase;

    public function test_addOneProductToCartTest(): void
    {
        $this->assertDatabaseEmpty('carts');

        $this->seed([
            ProductSeeder::class,
        ]);

        $cart = CartFactory::make();
        $action = new AddProductToCart();
        $products = Product::all();

        $action->add($products[0]->id);

        $this->assertDatabaseHas('cart_items', [
            'cart_id' => $cart->id,
            'product_id' => $products[0]->id,
            'quantity' => 1,
        ]);
    }

    public function test_addThreeProductToCartTest(): void
    {
        $this->assertDatabaseEmpty('carts');

        $this->seed([
            ProductSeeder::class,
        ]);

        $cart = CartFactory::make();
        $action = new AddProductToCart();
        $products = Product::all();

        $action->add($products[0]->id);
        $action->add($products[0]->id);
        $action->add($products[0]->id);

        $this->assertDatabaseHas('cart_items', [
            'cart_id' => $cart->id,
            'product_id' => $products[0]->id,
            'quantity' => 3,
        ]);
    }

    public function test_removeSomeQuantityFromCartItem(): void
    {
        $this->assertDatabaseEmpty('carts');

        $this->seed([
            ProductSeeder::class,
        ]);

        $cart = CartFactory::make();
        $addAction = new AddProductToCart();
        $removeAction = new RemoveProductFromCart();

        $products = Product::all();

        $addAction->add($products[0]->id, 3);

        $this->assertDatabaseHas('cart_items', [
            'cart_id' => $cart->id,
            'product_id' => $products[0]->id,
            'quantity' => 3,
        ]);

        $cartItem = CartItem::where('product_id', $products[0]->id)->first();

        $addAction->add($products[0]->id, -2);

        $this->assertDatabaseHas('cart_items', [
            'product_id' => $products[0]->id,
            'quantity' => 1,
        ]);
    }

    public function test_removeCartItemFromCartTest(): void
    {
        $this->assertDatabaseEmpty('carts');

        $this->seed([
            ProductSeeder::class,
        ]);

        $cart = CartFactory::make();
        $addAction = new AddProductToCart();
        $removeAction = new RemoveProductFromCart();

        $products = Product::all();

        $addAction->add($products[0]->id);
        $addAction->add($products[0]->id);
        $addAction->add($products[0]->id);

        $this->assertDatabaseHas('cart_items', [
            'cart_id' => $cart->id,
            'product_id' => $products[0]->id,
            'quantity' => 3,
        ]);

        $cartItem = CartItem::where('product_id', $products[0]->id)->first();


        $removeAction->remove($cartItem->id);

        $this->assertDatabaseMissing('cart_items', [
            'product_id' => $products[0]->id,
        ]);
    }
}
