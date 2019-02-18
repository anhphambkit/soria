<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/17/19
 * Time: 14:59
 */
?>
<form role="form" class="address-account-form">
    <div class="form-group row">
        <div class="col-md-12 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('address-form.full_name'))
                @slot('name', 'full_name')
                @slot('id', 'full_name')
                @slot('class', 'full_name')
                @slot('required', true)
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('address-form.mobile_phone'))
                @slot('name', 'mobile_phone')
                @slot('id', 'mobile_phone')
                @slot('class', 'mobile_phone')
                @slot('pattern', "[0-9]")
                @slot('required', true)
            @endcomponent
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12 form-custom-validate-js">
            @component('components.elements.field')
                @slot('title', trans('address-form.province_city'))
                @slot('name', 'province_city')
                @slot('id', 'province_city')
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
                @slot('name', 'district')
                @slot('id', 'district')
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
                @slot('name', 'ward')
                @slot('id', 'ward')
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
                @slot('id', 'address')
                @slot('class', 'address')
                @slot('required', true)
                @slot('type', 'editor')
            @endcomponent
        </div>
    </div>
    <div class="form-group row action-group">
        <div class="col-12 text-right">
            @component('components.elements.button')
                @slot('control', 'submit')
                @slot('id', 'submit-new-product-category')
                @slot('label', trans('generals.create'))
                @slot('attributes', [ 'data-btn-action' => 'edit', 'data-control' => 'cancel', 'data-dismiss' => "modal" ])
            @endcomponent

            @component('components.elements.button')
                @slot('control', 'button')
                @slot('id', 'cancel-new-product-category')
                @slot('attributes', [ 'data-btn-action' => 'edit', 'data-control' => 'cancel', 'data-dismiss' => "modal" ])
                @slot('label', trans('generals.cancel'))
            @endcomponent
        </div>
    </div>
</form>
