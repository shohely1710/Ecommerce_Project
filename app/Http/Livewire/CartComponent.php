<?php

namespace App\Http\Livewire;

use Livewire\Component;
//use Gloudemans\Shoppingcart\Facades\Cart;

use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowID)
    {
        $product = Cart::get($rowID);
        $qty = $product->qty + 1;
        Cart::update($rowID, $qty);
    }

    public function decreaseQuantity($rowID)
    {
        $product = Cart::get($rowID);
        $qty = $product->qty - 1;
        Cart::update($rowID, $qty);
    }

    public function destroy($rowID)
    {
        Cart::remove($rowID);
        session()->flash('success_message', 'Item has been removed');
    }
    public function render()
    {
        return view('livewire.cart-component')->layout("layouts.base");
    }
}
