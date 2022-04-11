@extends('layouts.app')

@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div>
            <!--/breadcrums-->

            <div class="step-one">
                <h2 class="heading">Step1</h2>
            </div>
            <div class="checkout-options">
                <h3>New User</h3>
                <p>Checkout options</p>
                <ul class="nav">
                    <li>
                        <label><input type="checkbox"> Register Account</label>
                    </li>
                    <li>
                        <label><input type="checkbox"> Guest Checkout</label>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-times"></i>Cancel</a>
                    </li>
                </ul>
            </div>
            <!--/checkout-options-->

            <div class="register-req">
                <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
            </div>
            <!--/register-req-->

            <div class="shopper-informations">
                <div class="row">

                    <div class="col-md-8">
                        <div class="bill-to">
                            <p>Bill To</p>
                            <div class="form-one">
                                <form action="{{ route('orderD') }}" method="POST">
                                    @csrf



                                    <input type="text" placeholder="First Name *" name="firstname">
                                    <input type="text" placeholder="Last Name *" name="lastname">
                                    <input type="text" placeholder="Email*" name="email">

                                    <input type="text" placeholder="Address *" name="address">

                                    {{-- <input type="text" placeholder="Zone*" name="zone"> --}}
                                    <select name="zone">
                                        <option>-- Zone --</option>
                                        <option value="usa">United States</option>
                                        <option value="bangla">Bangladesh</option>
                                        <option value="uk">UK</option>

                                    </select><br><br>

                                    <select name="state">
                                        <option>-- State --</option>
                                        <option value="usa">United States</option>
                                        <option value="bangla">Bangladesh</option>
                                        <option value="uk">UK</option>
                                    </select><br><br>


                                    <input type="text" name="phone" placeholder="Phone *">

                                    <button class="btn btn-default check_out" type="submit" name="submit">make
                                        payment</button>
                                </form>
                            </div>
                            {{-- <div class="form-two">
                                <form>

                                </form>
                            </div> --}}
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </section>
    <!--/#cart_items-->

@endsection
