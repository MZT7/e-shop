<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <!--/slider-->
    @include('inc.header')
    {{-- <input type="text" wire:model='search' />
    {{ $search }} --}}

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><button wire:click='men()'>Men</button></h4>
                                    {{-- <h4 class="panel-title"><a href="{{ route('products.men') }}">Men</a></h4> --}}
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><button wire:click='women()'>Women</button></h4>
                                    {{-- <h4 class="panel-title"><a href="{{ route('products.women') }}">Women</a></h4> --}}
                                </div>
                            </div>
                        </div>
                        <!--/category-products-->


                        <!--/brands_products-->




                        <!--/shipping-->

                    </div>
                </div>
                {{-- {{ $prod }} --}}
                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <!--features_items-->
                        <h2 class="title text-center">Features Items{{ $cartItems ?? '' }}</h2>
                        @forelse ($products as $product)
                            {{-- <livewire:add-products :product="$product" :wire:key="$product->id" /> --}}
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            {{-- {{ Storage::disk('local')->url('p-img/') . $product->image }} --}}
                                            <a href="{{ route('productDetails', ['id' => $product->id]) }}">
                                                {{ $product->id }}
                                                <img src="{{ Storage::disk('local')->url('p-img/') . $product->image }}"
                                                    alt="" />
                                                <h2>${{ $product->price }}</h2>
                                                <p>{{ $product->name }}</p>
                                            </a>
                                            <button wire:click='addToCart({{ $product->id }})'
                                                class="btn btn-default add-to-cart"
                                                {{ in_array($product->id, $flag) ? 'disabled' : '' }}><i
                                                    class="fa fa-shopping-cart"></i>Add
                                                to cart</button>

                                        </div>
                                        {{-- <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>${{ $product->price }}</h2>
                                                <p>{{ $product->name }}</p>
                                                <button wire:click='addToCart({{ $product->id }})'
                                                    class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <h1>No data found</h1>
                        @endforelse



                    </div>
                    <!--features_items-->



                    <!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>


</div>
