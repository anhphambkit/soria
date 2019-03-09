<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 3/9/19
 * Time: 12:58
 */
?>
@extends('backend.modern-admin.master')

@section('desc')

@endsection

@section('metas')

@endsection

@section('title')
    Manage Orders
@endsection

@section('fonts')

@endsection

@section('theme-css')

@endsection

@section('core-scripts')
@endsection

@section('plugin-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/plugins/noty/noty.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/plugins/jquery-confirm/jquery-confirm.min.css')}}"> <!-- original -->
@endsection

@section('page-css')
@endsection

@section('styles')
@endsection
@section('breadcrumbs')
    @component('components.layouts.breadcrumbs')
        @slot('header', trans('admin-shop.header_detail_invoice_order'))
        @slot('items', [
            [
                'active' => false,
                'link' => route('admin.dashboard', $domain),
                'title' => trans('breadcrumbs.home')
            ],
            [
                'active' => false,
                'link' => route('admin.product.index', $domain),
                'title' => trans('breadcrumbs.invoice_order')
            ],
            [
                'active' => true,
                'link' => '#',
                'title' => trans('breadcrumbs.detail')
            ],
        ])
    @endcomponent
@endsection

@section('header-right')
    <a href="{{ route('admin.invoice_order.index', $domain) }}" class="btn btn-primary btn-back-list-custom">
        Back To Manage Invoice Orders
    </a>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="none-padding col-lg-12">
                @component('components.sections.card')
                    @slot('id', 'card-detail-invoice-order')
                    @slot('title')
                        <div class="title-section-custom row">
                            <div class="col-md-6 title-section-detail-invoice">
                                <h4>
                                    Detail Order #{{$detailOrder->id}} - <span class="status-invoice-custom badge badge-primary">{{ $detailOrder->status_name }}</span>
                                </h4>
                            </div>
                            <div class="col-md-5 text-right created-invoice">
                                Ngày tạo đơn hàng: {{$detailOrder->created_at}}
                            </div>
                        </div>
                    @endslot
                    @slot('content')
                            <!-- Invoice Customer Details -->
                            <div id="invoice-customer-details" class="checkout-information-section row">
                                <div class="col-md-6 col-sm-12 text-center text-md-left">
                                    @component('backend.modern-admin.components.card-bg-icon')
                                        @slot('icon', 'icon-user font-large-2 text-white')
                                        @slot('bgCustom', 'bg-info')
                                        @slot('content')
                                            <div class="invoice-detail-block invoice-customer-info">
                                                <h4 class="title-information-block title-checkout-information uppercase">
                                                    {{ trans('admin-shop.information_receiver') }}
                                                </h4>
                                                <ul class="px-0 list-unstyled">
                                                    <li class="text-bold-800">
                                                        <span class="sub-title-block-custom">
                                                            {{ trans('address-form.receiver') }}:
                                                        </span> {{ $detailOrder->customer }}
                                                    </li>
                                                    <li>
                                                        <span class="sub-title-block-custom">
                                                            {{ trans('address-form.mobile_phone') }}:
                                                        </span> {{ $detailOrder->mobile_phone }}</li>
                                                    <li>
                                                        <span class="sub-title-block-custom">
                                                            {{ trans('address-form.email') }}:
                                                        </span> {{ $detailOrder->email }}</li>
                                                    <li>
                                                         <span class="sub-title-block-custom">
                                                             {{ trans('address-form.address') }}:
                                                        </span> {{ $detailOrder->address }}
                                                    </li>
                                                </ul>
                                            </div>
                                        @endslot
                                    @endcomponent
                                </div>
                                <div class="col-md-3 col-sm-12 text-center text-md-left">
                                    @component('backend.modern-admin.components.card-bg-icon')
                                        @slot('icon', 'icon-basket-loaded font-large-2 text-white')
                                        @slot('bgCustom', 'bg-success')
                                        @slot('content')
                                            <div class="invoice-detail-block invoice-shipping-info">
                                                <h4 class="title-information-block title-checkout-information uppercase">
                                                    {{ trans('admin-shop.information_shipping') }}
                                                </h4>
                                                <p>{{ $detailOrder->shipping }}</p>
                                            </div>
                                        @endslot
                                    @endcomponent
                                </div>
                                <div class="col-md-3 col-sm-12 text-center text-md-left">
                                    @component('backend.modern-admin.components.card-bg-icon')
                                        @slot('icon', 'icon-wallet font-large-2 text-white')
                                        @slot('bgCustom', 'bg-warning')
                                        @slot('content')
                                            <div class="invoice-detail-block invoice-payment-info">
                                                <h4 class="title-information-block title-checkout-information uppercase">
                                                    {{ trans('admin-shop.information_checkout') }}
                                                </h4>
                                                <p>{{ $detailOrder->payment }}</p>
                                            </div>
                                        @endslot
                                    @endcomponent
                                </div>
                            </div>
                            <!--/ Invoice Customer Details -->

                            <!-- Invoice Items Details -->
                            <div id="invoice-items-details" class="pt-2">
                                <div class="row">
                                    <div class="table-responsive col-sm-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th class="text-right">Price</th>
                                                    <th class="text-right">Quantity</th>
                                                    <th class="text-right">Sale Price</th>
                                                    <th class="text-right">Sub Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orderProducts as $orderProduct)
                                                    @php
                                                        $featureImageOrderProduct = $orderProduct->medias[0];
                                                        $linkProduct = "{$orderProduct->slug}.{$orderProduct->id}";
                                                    @endphp
                                                    <tr>
                                                        <td class="name-product-item-invoice">
                                                            <img class="img-product-invoice-item thumb-custom" src="{{ asset($featureImageOrderProduct['path_org']) }}" width="130" height="182" alt="{{ $orderProduct->name }}">
                                                            <div class="info-product-invoice-item">
                                                                <a class="name" href="{{ route('client.product.detail', $linkProduct) }}">
                                                                    {{ $orderProduct->name }}
                                                                </a>
                                                                <p>Sku: {{ $orderProduct->sku }}</p>
                                                            </div>
                                                        </td>
                                                        <td class="price-product-item-invoice text-right vertical-middle-custom">{{ number_format($orderProduct->price, 0, ',', '.') }} đ</td>
                                                        <td class="quantity-product-item-invoice text-right vertical-middle-custom">{{ number_format($orderProduct->quantity, 0, ',', '.') }}</td>
                                                        <td class="sale-price-product-item-invoice text-right vertical-middle-custom">{{ number_format($orderProduct->sale_price, 0, ',', '.') }} đ</td>
                                                        <td class="sub-price-product-item-invoice text-right vertical-middle-custom">{{ number_format($orderProduct->price - $orderProduct->sale_price, 0, ',', '.') }} đ</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                            <!--Total Summary List-->
                                            <tr>
                                                <td colspan="4" class="info-price-invoice text-right no-border-custom">
                                                    <span>Tổng tạm tính</span>
                                                </td>
                                                <td class="no-border-custom price-custom text-right">{{ number_format($detailOrder->sub_total, 0, ',', '.') }} đ</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="info-price-invoice text-right no-border-custom">
                                                    <span>Giảm giá</span>
                                                </td>
                                                <td class="no-border-custom price-custom text-right">-{{ number_format($detailOrder->discount_on_products + $detailOrder->discount_price, 0, ',', '.') }} đ</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="info-price-invoice text-right no-border-custom">
                                                    <span>Phí vận chuyển</span>
                                                </td>
                                                <td class="no-border-custom price-custom text-right">{{ number_format($detailOrder->shipping_fee, 0, ',', '.') }} đ</td>
                                            </tr>

                                            <!--Final Total-->
                                            <tr>
                                                <td colspan="4" class="info-price-invoice text-right no-border-custom">
                                                    <span>Tổng cộng</span>
                                                </td>
                                                <td class="no-border-custom text-right total-price-custom">
                                                    <span class="sum">{{ number_format($detailOrder->total_price, 0, ',', '.') }} đ</span>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    @endslot
                    @slot('controls', ['reload', 'edit'])
                    @slot('class','card-setting')
                @endcomponent
            </div>
        </div>
    </div>
@endsection

@section('core-footer-scripts')

@endsection

@section('theme-scripts')

@endsection

@section('plugin-scripts')
    <script src="{{ asset('assets/vendors/plugins/noty/noty.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/plugins/jquery-confirm/jquery-confirm.min.js')}}" type="text/javascript"></script>
@endsection

@section('page-scripts')
    <script>
        const URL = {
            GET_ALL_ORDERS : "{{ route('admin_ajax.invoice_order.get_all_orders', $domain) }}",
        };
    </script>
    <script src="{{ asset('assets/backend/modern-admin/assets/js/pages/invoice-order/manage-order.js') }}" type="text/javascript"></script>
@endsection

