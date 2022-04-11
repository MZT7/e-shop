<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class CartCount extends Component
{
    public $cartItems;

    protected $listeners = ['cartCount' => 'mount', 'cartDelete' => 'mount'];

    public function mount()
    {
        # code...
        $cart = Session::get('cart') ?? '';

        $this->cartItems = $cart->totalQuantity ?? '';
        if ($this->cartItems === 0) {
            # code...
            $this->cartItems = '';
        }
    }
    public function render()
    {
        return view('livewire.cart-count');
    }
}
