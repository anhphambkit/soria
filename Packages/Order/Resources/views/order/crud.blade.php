@extends('theme::layouts.admin')
@section('styles')
    <link href="{{ asset('packages/theme/vendors/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('packages/order/assets/css/order/order.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @component('theme::components.cardbox')
                @slot('title', trans('order::order.package'))
                @slot('isActive', true)
                @slot('content')
                <p class="text-muted font-14 m-b-20">...</p>
                <form role="form" id="order-form">
                    <div class="row">
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'Title')
                            @slot('name', 'title')
                            @slot('id', 'order-title')
                            @if(isset($order))
                                @slot('value', $order->title)
                            @else
                                @slot('value', '')
                            @endif
                            @endcomponent
                        </div>
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.desc'))
                            @slot('name', 'desc')
                            @slot('id', 'order-desc')
                            @if(isset($order))
                                @slot('value', $order->desc)
                            @else
                                @slot('value', '')
                            @endif
                            @endcomponent
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'Customer name')
                            @slot('name', 'customer_name')
                            @slot('id', 'order-customer-name')
                            @if(isset($order))
                                @slot('value', $order->customer_name)
                            @else
                                @slot('value', '')
                            @endif
                            @endcomponent
                        </div>
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'Customer phone')
                            @slot('name', 'customer_phone')
                            @slot('id', 'order-customer-phone')
                            @if(isset($order))
                                @slot('value', $order->customer_phone)
                            @else
                                @slot('value', '')
                            @endif
                            @endcomponent
                        </div>
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'Ship address')
                            @slot('name', 'shipping_address')
                            @slot('id', 'order-shipping-address')
                            @if(isset($order))
                                @slot('value', $order->shipping_address)
                            @else
                                @slot('value', '')
                            @endif
                            @endcomponent
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'User order' )
                            @slot('name', 'user_id')
                            @slot('type', 'dropdown')
                            @slot('id', 'user-order')
                            <?php
                            $dropDown = [];
                            foreach($users as $user){
                                $dropDown[$user->getKey()] = $user->username;
                            }
                            $dropDown['none'] = 'None';
                            ?>
                            @slot('values', $dropDown)
                            @if(isset($order))
                                @slot('value', $order->user_id)
                            @else
                                @slot('value', 'none')
                            @endif
                            @endcomponent
                        </div>
                        <div class="form-group col-md-8">
                            @component('theme::components.field')
                            @slot('title', 'Note')
                            @slot('name', 'note')
                            @slot('id', 'order-note')
                            @if(isset($order))
                                @slot('value', $order->note)
                            @else
                                @slot('value', '')
                            @endif
                            @endcomponent
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'Tax (%)')
                            @slot('type', 'number')
                            @slot('attributes', ['max' => 100, 'min' => 0, 'onchange' => 'orderProducts.tax=this.value;orderProducts.parseTemplate()' ])
                            @slot('name', 'tax')
                            @slot('id', 'order-tax')
                            @if(isset($order))
                                @slot('value', $order->tax)
                            @else
                                @slot('value', 0)
                            @endif
                            @endcomponent
                        </div>
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'Fee ship')
                            @slot('name', 'fee_ship')
                            @slot('attributes', ['onchange' => 'orderProducts.feeship=this.value;orderProducts.parseTemplate()' ])
                            @if(isset($order))
                                @slot('value', $order->fee_ship)
                            @else
                                @slot('value', 0)
                            @endif
                            @endcomponent
                        </div>

                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'Ship date')
                            @slot('type', 'date')
                            @slot('name', 'ship_date')
                            @if(isset($order))
                                @slot('value', $order->ship_date)
                            @else
                                @slot('value', 0)
                            @endif
                            @endcomponent
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'Payment method' )
                            @slot('name', 'payment_type')
                            @slot('type', 'dropdown')
                            @slot('id', 'order-method')
                            <?php
                                $dropDown = [];
                                foreach(config('payment.available') as $method => $support){
                                    $dropDown[$method] = $support;
                                }
                            ?>
                            @slot('values', $dropDown)
                            @if(isset($order))
                                @slot('value', $order->payment_type)
                            @endif
                            @endcomponent
                        </div>
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'Payment status' )
                            @slot('name', 'payment_status')
                            @slot('type', 'dropdown')
                            @slot('id', 'payment-status')
                            <?php
                                $dropDown = [
                                    'P' => 'Pending',
                                    'C' => 'Completed',
                                ];
                            ?>
                            @slot('values', $dropDown)
                            @if(isset($order))
                                @slot('value', $order->payment_status)
                            @endif
                            @endcomponent
                        </div>
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'Shipping status' )
                            @slot('name', 'shipping_status')
                            @slot('type', 'dropdown')
                            @slot('id', 'shipping-status')
                            <?php
                                $dropDown = [
                                    'I' => 'In stock',
                                    'O' => 'On delivery',
                                    'C' => 'Completed',
                                ];
                            ?>
                            @slot('values', $dropDown)
                            @if(isset($order))
                                @slot('value', $order->shipping_status)
                            @endif
                            @endcomponent
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12" id="product-list-inject">

                        </div>
                    </div>

                    <div class="form-group row action-group">
                        <div class="col-12 text-right">
                            @component('theme::components.button')
                            @slot('id', 'submit-order')
                            @slot('control', 'submit')
                            @if(isset($order))
                                @slot('label', trans('theme::theme.action.update'))
                            @else
                                @slot('label', trans('theme::theme.action.create'))
                            @endif
                            @endcomponent

                            @component('theme::components.button')
                            @slot('id', 'back-order')
                            @slot('label', trans('theme::theme.back'))
                            @endcomponent
                        </div>
                    </div>
                </form>
                @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection

@section('plugin-scripts')
    <script src="{{ asset('packages/theme/vendors/js/select2.min.js')}}"></script>
    <script src="{{ asset('packages/theme/vendors/js/bootstrap-datepicker.min.js')}}"></script>
@endsection

@section('scripts')
    <script id="product-list-template" type="text/x-handlebars-template">
        <div>
        <table id="product-list-tbl" class="table table-striped" cellspacing="0" width="100%">
            <thead>
                <tr role="row">
                    <th class="sorting">#ID</th>
                    <th>Image</th>
                    <th class="sorting">SKU</th>
                    <th class="sorting">Product</th>
                    <th class="sorting">Original Price</th>
                    <th class="sorting">Sale Price</th>
                    <th class="sorting" width="80px">Quantity</th>
                    <th class="sorting">Total</th>
                    <th class="sorting">Actions</th>
                </tr>
            </thead>
            <tbody>
            @{{#products}}
                <tr role="row" class="@{{rowClass @index }}">
                    <td>@{{ product_id }}</td>
                    <td><img src="@{{ img }}" class="img-thumbnail" alt="" /></td>
                    <td>@{{ sku }}</td>
                    <td><a href="@{{ link }}" target="_blank">@{{ name }}</a></td>
                    <td>@{{priceFormat price }}</td>
                    <td>@{{priceFormat sale_price }}</td>
                    <td>
                        <input type="number" class="form-control" value="@{{ quantity }}" onchange="orderProducts.update(@{{ @index}}, this.value)"/>
                    </td>
                    <td>
                        @{{itemTotal sale_price quantity}}
                    </td>
                    <td>
                        <i class="fi fi-trash btn-action" data-action="del" onclick="orderProducts.remove(@{{ @index }})"></i>
                    </td>
                </tr>
            @{{/products}}
            </tbody>
        </table>
        <div class="text-right">
            <h4 class="sub-total">Sub total: @{{priceFormat subTotal }}</h4>
            <p class="fee-ship">Fee ship: @{{priceFormat feeship }}</p>
            <p class="tax">Tax: @{{priceFormat taxValue }}</p>
            <h2 class="total">Total: @{{priceFormat total }}</h2>
        </div>
        </div>
    </script>
    <script>
        let updateMode = {!! isset($order) ? 'true': 'false' !!};
        let api = {
        order: {
                create: '{{ route('order.order.create') }}',
                @if(isset($order))
                update: '{{ route('order.order.update', $order->getKey()) }}',
                @endif
                calBilling: '{{ route('order.order.cal-billing') }}',
            }
        };
        let products = [];
        @if(isset($order) && !empty($order->orderItems()->get()))
        <?php
            $products = $order->orderItems()->get()->map(function($p) use($prodServices) {
                $product = $prodServices->get($p->product_id);
                return [
                    'product_id' => $p->product_id,
                    'price' => $p->price,
                    'sale_price' => $p->sale_price,
                    'quantity' => $p->quantity,
                    'sku' => $product->sku,
                    'name' => $product->name,
                    'link' => route('frontend.product.detail', $product->getKey()),
                    'img' => $product->thumbImg()->first() ? asset('storage/'.$product->thumbImg()->first()->path_small) : null,
                ];
            });
        ?>
        products = {!! json_encode($products) !!};
        @endif
    </script>
    <script src="{{ asset('packages/order/assets/js/order/order.crud.js')}}"></script>
@endsection