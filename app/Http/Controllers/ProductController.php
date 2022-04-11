<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    //

    public function index()
    {
        $title = 'Home';
        $cart = Session::get('cart');
        $products = Product::all();
        return view('pages.product')
            ->with('products', $products)
            ->with('cartItems', $cart)
            ->with('title', $title);
    }

    public function menProducts()
    {
        $products = DB::table('products')->where('type', 'men')->get();
        return view('pages.product')->with('products', $products);
    }
    public function womenProducts()
    {
        $products = DB::table('products')->where('type', '=', 'women')->get();

        return view('pages.product')->with('products', $products);
    }

    public function addProductsToCart(Request $request, $id)
    {
        //     $request->session()->forget('cart');
        //     $request->session()->flush();
        //dump($cart);

        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);
        $product = Product::find($id);
        $cart->addItem($id, $product);
        $request->session()->put('cart', $cart);

        return redirect()->route('products');
    }

    public function showCart()
    {

        $cart = Session::get('cart');

        if ($cart) {
            # code...
            // dump($cart);

            return view('pages.cart', ['cartItems' => $cart]);
        } else {
            # code...
            return redirect()->route('products');
        }
    }

    public function deleteItemsFromCart(Request $request, $id)
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

        return redirect()->route('cart');
    }

    public function increment(Request $request, $id)
    {
        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);
        $product = Product::find($id);
        $cart->addItem($id, $product);
        $request->session()->put('cart', $cart);

        // return redirect()->route('cart');

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
        }
        // dd($cart->items[$id]['quantity']);

        return redirect()->route('cart');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $products = DB::table('products')->where('name', 'Like', "$search%")->get();
        return view('pages.product')->with('products', $products);
    }

    public function createOrder()
    {
        $cart = Session::get('cart');

        if ($cart) {

            # code...

            $date = date('Y-m-d H:i:s');
            $newOrder = array('status' => 'on_hold', 'date' => $date, 'user_id' => auth()->user()->id, 'del_date' => $date, 'price' => $cart->totalPrice, 'total_quantity' => $cart->totalQuantity);
            $order = DB::table('orders')->insert($newOrder);
            $order_id = db::getPdo()->lastInsertId();
            //DB::table('orders')->orderBy('id', 'desc')->first();

            foreach ($cart->items as $cart_item) {
                # code...
                $item_id = $cart_item['data']['id'];
                $item_name = $cart_item['data']['name'];
                $item_price = $cart_item['data']['price'];
                $item_quantity = $cart_item['quantity'];
                $order_item = array('item_id' => $item_id, 'item_name' => $item_name, 'item_price' => $item_price, 'order_id' => $order_id, 'item_quantity' => $item_quantity);
                DB::table('order_items')->insert($order_item);
            }

            // dd($orders = Order::all());

            // foreach ($orders as $order) {
            //     # code.
            //     dd($order->user->name);

            // }
            //dd($order->user->name);
            // dd(auth()->user()->orders('price')->first());
            Session::forget('cart');
            //Session::flush();
            //return redirect()->route('home')->withSuccess('thank u for choosing us');

        } else {

            return redirect()->route('products');
        }
    }

    public function productDetails($id)
    {
        # code...
        $product = Product::findorfail($id);
        return view('pages.productDetails', ['product' => $product]);
    }

    public function checkout()
    {

        return view('pages.checkout');
    }

    public function orderD(Request $request)
    {
        # code...
        $data = $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'zone' => 'required',
            'state' => 'required',
            'address' => 'required',

        ]);


        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
        $address = $data['address'];
        $email = $data['email'];
        $phone = $data['phone'];
        $zone = $data['zone'];
        $state = $data['state'];

        $info = array('firstname' => $firstname, 'lastname' => $lastname, 'address' => $address, 'email' => $email, 'phone' => $phone, 'zone' => $zone, 'state' => $state,);



        $cartItems = $request->session()->get('cart');


        return view('pages.form', ['order' => $info, 'cartItems' => $cartItems]);
    }
}
