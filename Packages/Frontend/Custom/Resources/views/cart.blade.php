@extends('frontend.custom::layouts.frontend')
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="breadcrumbs">
        <p><a href="#">Home</a> <i class="icons icon-right-dir"></i> Shopping Cart</p>
    </div>
</div>

<!-- Main Content -->
<section class="main-content col-lg-9 col-md-9 col-sm-9">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="carousel-heading no-margin">
                <h4>Bill to &amp; Shippment information</h4>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <p><strong>Bill to</strong></p>
                        <p>
                            <input type="text" id="customer_name" value="{{ auth()->check() ? auth()->user()->first_name. ' '. auth()->user()->middle_name. ' '. auth()->user()->last_name : ''  }}">
                        </p>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <p><strong>Address</strong></p>
                        <p>
                            <input type="text" id="shipping_address" value="">
                        </p>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <p><strong>Phone number</strong></p>
                        <p>
                            <input type="text" id="customer_phone" value="">
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="carousel-heading">
                <h4>Shopping Cart</h4>
            </div>
            <table class="shopping-table">
                <tr>
                    <th colspan="2">Product Image and Name</th>
                    <th>SKU</th>
                    <th>Price</th>
                    <th>Quanitity</th>
                    <th>Total</th>
                </tr>
                @foreach($cartServices->all() as $cart)
                <?php $p = $prodServices->get($cart->id); $thumb = $p->thumbImg()->first(); ?>
                <tr>
                    <td class="image-column">
                        @if(!empty($thumb))
                        <a href="{{ route('frontend.product.detail', $p->slug) }}"><img src="{{ asset('storage/'. $thumb->path_medium) }}" alt=""></a>
                        @endif
                    </td>
                    <td>
                        <p>
                            <a href="{{ route('frontend.product.detail',$p->slug) }}">{{ $cart->name }}</a>
                        </p>
                    </td>
                    <td><p>{{ $p->sku }}</p></td>
                    <td>
                        <p>
                            @if($p->price > $p->sale_price)
                                <del>{{ number_format($p->price) }}</del>
                            @endif
                            {{ number_format($p->sale_price) }}
                        </p>
                    </td>
                    <td class="quantity">
                        <input type="number" value="{{ $cart->qty }}" id="qty-{{ $p->sku }}">
                        <p>
                            <a href="#" onclick="updateItemCart('{{ $cart->rowId }}', $('#qty-{{ $p->sku }}').val())"><i class="icons icon-ok-3"></i> Update</a><br>
                            <a href="#" onclick="removeItemFromCart('{{ $cart->rowId }}'); return false;" class="red-hover"><i class="icons icon-cancel-3"></i> Delete</a>
                        </p>
                    </td>
                    <td><p>{{ number_format( $p->sale_price * $cart->qty )  }}</p></td>
                </tr>
                @endforeach
                <tr>
                    <td class="align-right" colspan="5">Product prices result</td>
                    <td><strong>{{ $cartServices->total() }}</strong></td>
                </tr>

            </table>

        </div>

    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="checkout-form">
                <p>Notes and special requests</p>
                <textarea id="note"></textarea>
                <br><br>
                <input type="submit" id="checkout" class="red huge" value="Checkout Now">
            </div>

        </div>

    </div>


</section>
<!-- /Main Content -->


<!-- Sidebar -->
<aside class="sidebar col-lg-3 col-md-3 col-sm-3 right-sidebar">
    @component('frontend.custom::components.widgets.categories')
    @endcomponent
    @component('frontend.custom::components.widgets.random-products-slider')
    @endcomponent
    @component('frontend.custom::components.widgets.bestseller')
    @endcomponent
</aside>
<!-- /Sidebar -->
@endsection

@section('scripts')
    <script>
        $('#checkout').on('click', function(e){
            e.preventDefault();
            $.post('{{ route('frontend.cart.checkout') }}', {
                note: $('#note').val(),
                shipping_address: $('#shipping_address').val(),
                customer_phone: $('#customer_phone').val(),
                customer_name: $('#customer_name').val(),
                payment_type: 'COD',
            })
            .then(function(){

            });
        });
    </script>
@endsection