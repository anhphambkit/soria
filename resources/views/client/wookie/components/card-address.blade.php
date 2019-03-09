<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/23/19
 * Time: 01:49
 */
?>
<div class="card card-address card-custom @if($address['is_shipping']) border-dashed-custom @endif" data-address-id="{{ $address['id'] }}">
    {{--<div class="card-header">--}}
        {{--<span class="title-address">--}}
            {{--{{ $address['name_address_book'] }}--}}
        {{--</span>--}}
        {{--@if($address['is_default'])--}}
            {{--<span class="badge badge-success status-address">--}}
                {{--{{ trans('generals.default') }}--}}
            {{--</span>--}}
        {{--@endif--}}
    {{--</div>--}}
    <div class="card-body">
        <div class="card-text full-name">
            <span class="title-custom">
                {{ trans('address-form.receiver') }}:
            </span>
            <span class="content-custom">
                {{ $address['full_name'] }}
            </span>
        </div>
        <div class="card-text address">
            <span class="title-custom">
                {{ trans('address-form.address') }}:
            </span>
            <span class="content-custom">
                {{ $address['address'] }}, {{ $address['province_city_name'] }}, {{ $address['district_name'] }}, {{ $address['ward_name'] }}
            </span>
        </div>
        <div class="card-text phone">
            <span class="title-custom">
                {{ trans('address-form.mobile_phone') }}:
            </span>
            <span class="content-custom">
                {{ $address['mobile_phone'] }}
            </span>
        </div>
        <div class="card-btn-area">
            <span class="card-action">
                <a href="#" class="btn btn-small btn-custom-shop btn-ship-to-this-address @if(!$address['is_shipping']) btn-black-custom @endif">{{ trans('address-form.ship_to_address') }}</a>
            </span>
            <span class="card-action">
                <a href="#" class="btn btn-small btn-edit-shop btn-custom-shop btn-edit-shipping-address">{{ trans('generals.edit') }}</a>
            </span>
            @if(!$address['is_default'])
                <span class="card-action">
                    <a href="#" class="btn btn-small btn-edit-shop btn-custom-shop btn-delete-shipping-address">{{ trans('generals.delete') }}</a>
                </span>
            @endif
        </div>
    </div>
</div>
