<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AddProducts extends Component
{

    public $prod;
    public $flag = [];
    // public $cartItems;
    public $search = '';

    protected $listeners = ['addToCart' => 'addToCart'];

    // protected $queryString = ['products'];

    public function mount()
    {
        $this->prod = Product::all();
        // $this->cartItems = Session::get('cart');
    }

    // public function updated()
    // {
    //     $this->prod = Product::all();
    //     return $this->prod;
    // }



    public function render()
    {

        $products = $this->prod;
        // $cart = Session::get('cart') ?? '';
        // $this->cartItems = $cart->totalQuantity ?? '';
        return view('livewire.add-products', ['products' => $products,]);
        // ->layout('layouts.app', ['cartCount' => $this->cartItems]);
    }

    public function addToCart($id)
    {
        $prevCart = session()->get('cart');
        $cart = new Cart($prevCart);
        $product = Product::find($id);
        $cart->addItem($id, $product);
        session()->put('cart', $cart);

        $this->emit('cartCount');
        $this->flag[] = $id;
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Added To Cart',
            'icon' => 'info',
            'iconColor' => 'green',
        ]);
    }
    public function men()
    {
        // $this->prod = [];
        // $this->reset('prod');
        $this->prod = Product::where('type', '=', 'men')->get();
        return $this->prod;
    }

    public function women()
    {
        // $this->prod = [];
        // DB::table('products')->
        // $this->reset('prod');
        $this->prod = Product::where('type', '=', 'women')->get();
        return $this->prod;
    }

    public function updatedSearch()
    {
        $search = $this->search;
        $this->prod = Product::where('name', 'Like', "$search%")->get();

        return $this->prod;
    }
}
