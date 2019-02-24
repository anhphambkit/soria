<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 09:23
 */
?>
<div class="card card-address card-custom">
    <div class="card-header">
        <span class="title-address title-payment-card">
            {{ $address['name_address_book'] }}
        </span>
        <span class="change-address">
            <a href="#" class="btn btn-small btn-edit-shop btn-custom-shop btn-change-address">{{ trans('generals.edit') }}</a>
        </span>
    </div>
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
    </div>
</div>
