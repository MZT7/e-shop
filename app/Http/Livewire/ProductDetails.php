<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class ProductDetails extends Component
{

    public $product;

    public $flag = [];


    public function mount($id)
    {
        $this->product = Product::findorfail($id);
    }

    public function addToCart($id)
    {
        # code...
        // $this->emit('addToCart', $id);
        // $this->emitTo('AddProducts', 'addToCart', $id);
        $prevCart = session()->get('cart');
        $cart = new Cart($prevCart);
        $product = Product::find($id);
        $cart->addItem($id, $product);
        session()->put('cart', $cart);
        $this->flag[] = $id;

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Added To Cart',
            'icon' => 'info',
            'iconColor' => 'green',
        ]);

        $this->emit('cartCount');
    }



    public function render()
    {
        return view('livewire.product-details');
    }
}
