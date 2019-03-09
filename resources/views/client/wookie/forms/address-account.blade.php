<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/17/19
 * Time: 14:59
 */
$isDefault = !empty($isDefault) ? $isDefault : false;
$isUpdate = !empty($isUpdate) ? $isUpdate : false;
$formMode = ($isDefault && !$isUpdate) ? "create-default" : (($isUpdate) ? "update" : "create");
?>
<form role="form" class="address-account-form" id="form-{{ $formMode }}-address">
    {{--<div class="form-group row">--}}
        {{--<div class="col-md-12 form-custom-validate-js">--}}
            {{--@component('components.elements.field')--}}
                {{--@slot('title', trans('address-form.address_name'))--}}
                {{--@slot('name', 'name_address_book')--}}
                {{--@slot('id', 'address_name_'.$formMode)--}}
                {{--@slot('class', 'address_name')--}}
                {{--@slot('required', true)--}}
            {{--@endcomponent--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="form-group row">
        <div class="col-md-12 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('address-form.full_name'))
                @slot('name', 'full_name')
                @slot('id', 'full_name_'.$formMode)
                @slot('class', 'full_name')
                @slot('required', true)
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('generals.email'))
                @slot('name', 'email')
                @slot('id', 'email_'.$formMode)
                @slot('class', 'email')
                @slot('required', true)
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('address-form.mobile_phone'))
                @slot('name', 'mobile_phone')
                @slot('id', 'mobile_phone_'.$formMode)
                @slot('class', 'mobile_phone')
                @slot('required', true)
                @slot('attributes', [ 'data-mask' => "(000) 000-0000" ])
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('address-form.province_city'))
                @slot('name', 'province_city_code')
                @slot('id', 'province_city_'.$formMode)
                @slot('class', 'custom-select2 kc-province-city')
                @slot('type', 'dropdown')
                <?php
                foreach ($provincesCities as $provinceCity) {
                    $listCities[$provinceCity->id] = $provinceCity->name;
                }
                ?>
                @slot('values', $listCities)
                @slot('attributes', [ 'data-plugin' => 'select2' ])
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('address-form.district'))
                @slot('name', 'district_code')
                @slot('id', 'district_'.$formMode)
                @slot('class', 'custom-select2 kc-district')
                @slot('type', 'dropdown')
                @slot('values', [])
                @slot('attributes', [ 'data-plugin' => 'select2' ])
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('address-form.ward'))
                @slot('name', 'ward_code')
                @slot('id', 'ward_'.$formMode)
                @slot('class', 'custom-select2 kc-ward')
                @slot('type', 'dropdown')
                @slot('values', [])
                @slot('attributes', [ 'data-plugin' => 'select2' ])
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('address-form.address'))
                @slot('name', 'address')
                @slot('id', 'address_'.$formMode)
                @slot('class', 'address')
                @slot('required', true)
                @slot('type', 'editor')
            @endcomponent
        </div>
    </div>
    {{--<div class="form-group row @if($isDefault) d-none @endif">--}}
        {{--<div class="col-md-12 form-custom-validate-js">--}}
            {{--@component('components.elements.field')--}}
                {{--@slot('title', trans('address-form.set_default_address'))--}}
                {{--@slot('name', 'is_default')--}}
                {{--@slot('id', 'is-default_'.$formMode)--}}
                {{--@slot('required', true)--}}
                {{--@slot('type', 'checkbox')--}}
                {{--@slot('class', 'is-default')--}}
                {{--@if($isDefault)--}}
                    {{--@slot('checked', true)--}}
                {{--@else--}}
                    {{--@slot('checked', false)--}}
                {{--@endif--}}
            {{--@endcomponent--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="form-group row action-group">
        <div class="col-12 text-right">
            @if($formMode === "create-default")
                @component('components.elements.button')
                    @slot('control', 'submit')
                    @slot('id', 'submit-address-form_'.$formMode)
                    @slot('label', trans('checkout.ship_to_this_address'))
                    @slot('attributes', [ 'data-btn-action' => 'edit'])
                @endcomponent
            @else
                @component('components.elements.button')
                    @slot('control', 'cancel')
                    @slot('id', 'cancel-new-product-category')
                    @slot('class', 'btn-cancel-custom')
                    @slot('label', trans('generals.cancel'))
                @endcomponent
                @if($formMode === "create")
                    @component('components.elements.button')
                        @slot('control', 'submit')
                        @slot('id', 'submit-address-form_'.$formMode)
                        @slot('label', trans('generals.create'))
                        @slot('attributes', [ 'data-btn-action' => 'edit'])
                        @slot('attributes', [ 'data-btn-action' => 'edit'])
                    @endcomponent
                @else
                    @component('components.elements.button')
                        @slot('control', 'submit')
                        @slot('id', 'submit-address-form_'.$formMode)
                        @slot('label', trans('generals.update'))
                        @slot('attributes', [ 'data-btn-action' => 'edit'])
                    @endcomponent
                @endif
            @endif
        </div>
    </div>
</form>
