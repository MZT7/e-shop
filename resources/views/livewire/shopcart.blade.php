{{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
<div>
    @include('inc.header')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cartItems->items as $item)
                        <tr>

                            <td class="cart_product">
                                <a href=""><img
                                        src="{{ Storage::disk('local')->url('p-img/') . $item['data']['image'] }}"
                                        alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{ Str::limit($item['data']['name'],10,"...") }}</a></h4>
                                <p>{{ Str::limit($item['data']['description'],10) }}-{{ $item['data']['type'] }}</p>
                                <p>ID: </p>
                            </td>
                            <td class="cart_price">
                                <p>${{ $item['data']['price'] }}</p>
                            </td>

                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    {{--
                                    <livewire:shopcart :item=$item /> --}}
                                    <div style="text-align: center">
                                        <button wire:click="increment({{ $item['data']['id'] }})"
                                            class="cart_quantity_up">+</button>
                                        <h1>{{ $item['quantity'] }}</h1>
                                        {{-- <input class="cart_quantity_input" type="text" autocomplete="off" size="2"
                                            wire:model='quantity' wire:change='updateQ({{ $item[' data']['id'] }})'>
                                        --}}
                                        {{-- <h1>{{ $quantity }}</h1> --}}
                                        <button wire:click="decrement({{ $item['data']['id'] }})"
                                            class="cart_quantity_down">-</button>

                                    </div>

                                </div>

                            </td>

                            <td class="cart_total">
                                <p class="cart_total_price">${{ $item['totalSinglePrice'] }}</p>
                            </td>



                            <td class="cart_delete">
                                {{-- <a class="cart_quantity_delete"
                                    wire:click="deleteItems({{ $item['data']['id'] }})"><i class="fa fa-times"></i></a>
                                --}}
                                <button wire:click="deleteItems({{ $item['data']['id'] }})"
                                    class="cart_quantity_delete fa fa-times"></button>
                            </td>



                            {{-- <a class="cart_quantity_up"
                                href="{{ route('cart.inc', ['id' => $item['data']['id'] ]) }}"> + </a>
                            <input class="cart_quantity_input" type="text" name="quantity"
                                value="{{ $item['quantity'] }}" autocomplete="off" size="2">
                            <a class="cart_quantity_down" href="{{ route('cart.dec', ['id' => $item['data']['id']]) }}">
                                - </a> --}}



                        </tr>
                        @empty
                        <h1>empty cart</h1>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </section>
    <!--/#cart_items-->

    <section id="do_action">
        <div class="container">

            <div class="row">

                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            {{-- <li>Cart Sub Total <span>$59</span></li> --}}
                            <li>Quantity <span>{{ $cartItems->totalQuantity }}</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>${{ $cartItems->totalPrice }}</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="{{ route('checkout') }}">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>