@extends('layouts.app')


@section('content')

    <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
        @csrf
        <div class="row" style="margin-bottom:40px;">
            <div class="col-md-8 col-md-offset-2">
                <p>
                <div>
                    Lagos Eyo Print Tee Shirt
                    ₦ 2,950
                    @forelse ($cartItems->items as $item)

                        {{-- <h3>{{ $item['data']['price'] }}</h3> --}}
                        <h2>{{ $item['data']['name'] }}</h2>
                        <h3>{{ $item['quantity'] }}</h3>
                        <h3>{{ $item['totalSinglePrice'] }}</h3>
                    @empty
                        <h2>its empty</h2>
                    @endforelse

                    <h3>{{ $cartItems->totalQuantity }}</h3>
                    <h3>{{ $cartItems->totalPrice }}</h3>
                </div>
                </p>
                <input type="hidden" name="email" value="{{ $order['email'] }}"> {{-- required --}}
                {{-- <input type="hidden" name="orderID" value="345"> --}}
                <input type="hidden" name="first_name" value="{{ $order['firstname'] }}">
                <input type="hidden" name="last_name" value="{{ $order['lastname'] }}">
                <input type="hidden" name="phone" value="{{ $order['phone'] }}">
                <input type="hidden" name="amount" value="{{ $cartItems->totalPrice }}00"> {{-- required in kobo --}}
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="currency" value="NGN">
                <input type="hidden" name="metadata"
                    value="{{ json_encode($array = ['firstname' => $order['lastname']]) }}">
                {{-- For other necessary things you want to add to your payload. it is optional though --}}
                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}

                {{-- <input type="hidden" name="split_code" value="SPL_EgunGUnBeCareful"> --}}
                {{-- to support transaction split. more details https://paystack.com/docs/payments/multi-split-payments/#using-transaction-splits-with-payments --}}
                {{-- <input type="hidden" name="split" value="{{ json_encode($split) }}"> --}}
                {{-- to support dynamic transaction split. More details https://paystack.com/docs/payments/multi-split-payments/#dynamic-splits --}}
                {{-- {{ csrf_field() }} works only when using laravel 5.1, 5.2 --}}

                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> employ this in place of csrf_field only in laravel 5.0 --}}

                <p>
                    <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                    </button>
                </p>
            </div>
        </div>
    </form>


    <!--/#do_action-->
    {{-- <livewire:shopcart /> --}}

@endsection
