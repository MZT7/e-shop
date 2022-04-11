<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Shopcart extends Component
{

    public $totalSp;
    public $itemQ;
    public $quantity;
    //protected $listeners = ['mount'];

    public function mount()
    {

        //$this->itemQ = $item['quantity'];
        // $this->item = $item;

        // $this->totalSp = $item['totalSinglePrice'];
        $cart = Session::get('cart');
        if (empty($cart)) {
            # code...
            return redirect()->route('products');
        }
    }

    // public function showcart()
    // {

    //     $cart = Session::get('cart');
    //     if ($cart) {
    //         # code...
    //         return $this->render();
    //     } else {
    //         # code...
    //         return redirect()->route('products');

    //     }

    // }
    public function render()
    {
        $cart = Session::get('cart');
        //session()->forget('cart');

        return view('livewire.shopcart', ['cartItems' => $cart]);
    }

    public function updateQ(Request $request, $id)
    {
        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);
        if ($cart->items[$id]['quantity'] > 1) {
            # code...
            $product = Product::find($id);
            $cart->items[$id]['quantity'] = $this->quantity;
            $cart->items[$id]['totalSinglePrice'] = $cart->items[$id]['quantity'] * $product['price'];
            $cart->updatePriceAndQuantity();

            $request->session()->put('cart', $cart);
            // $this->itemQ = $cart->items[$id]['quantity'];
            // $this->totalSp = $cart->items[$id]['totalSinglePrice'];

        }
    }

    public function increment(Request $request, $id)
    {
        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);
        $product = Product::find($id);
        $cart->addItem($id, $product);
        $request->session()->put('cart', $cart);
        // $this->itemQ = $cart->items[$id]['quantity'];
        // $this->totalSp = $cart->items[$id]['totalSinglePrice'];

        //return redirect()->route('cart');

    }
    public function decrement(Request $request, $id)
    {
        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);
        if ($cart->items[$id]['quantity'] > 1) {
            # code...
            $product = Product::find($id);
            $cart->items[$id]['quantity'] = $cart->items[$id]['quantity'] - 1;
            $cart->items[$id]['totalSinglePrice'] = $cart->items[$id]['quantity'] * $product['price'];
            $cart->updatePriceAndQuantity();

            $request->session()->put('cart', $cart);
            // $this->itemQ = $cart->items[$id]['quantity'];
            // $this->totalSp = $cart->items[$id]['totalSinglePrice'];

        }
    }

    public function deleteItems(Request $request, $id)
    {
        $cart = $request->session()->get('cart');

        if (array_key_exists($id, $cart->items)) {
            # code...
            unset($cart->items[$id]);
            # code...
        }

        $prevCart = $request->session()->get('cart');
        $updatedCart = new Cart($prevCart);
        $updatedCart->updatePriceAndQuantity();

        $request->session()->put('cart', $updatedCart);

        $this->emit('cartDelete');

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Item Deleted',
            'icon' => 'warning',
            'iconColor' => 'red',
        ]);
    }
}
