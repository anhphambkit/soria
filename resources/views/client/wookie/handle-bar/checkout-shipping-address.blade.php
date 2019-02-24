<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/23/19
 * Time: 15:10
 */
?>
<h5>Select Shipping Address:</h5>
<div class="list-address-shipping">
    @{{#each addressBooks}}
        <div class="card card-address card-custom @{{#if is_shipping }} border-dashed-custom @{{/if}}" data-address-id="@{{ id }}">
            <div class="card-header">
                <span class="title-address">
                    @{{ name_address_book }}
                </span>
                @{{#if is_default }}
                    <span class="badge badge-success status-address">
                        Default
                    </span>
                @{{/if}}
            </div>
            <div class="card-body">
                <div class="card-text full-name">
                    <span class="title-custom">
                        Receiver:
                    </span>
                    <span class="content-custom">
                        @{{ full_name }}
                    </span>
                </div>
                <div class="card-text address">
                    <span class="title-custom">
                        Address:
                    </span>
                    <span class="content-custom">
                        @{{ address }}, @{{ province_city_name }}, @{{ district_name }}, @{{ ward_name }}
                    </span>
                </div>
                <div class="card-text phone">
                    <span class="title-custom">
                        Phone:
                    </span>
                    <span class="content-custom">
                        @{{ mobile_phone }}
                    </span>
                </div>
                <div class="card-btn-area">
                    <span class="card-action">
                        <a href="#" class="btn btn-small btn-custom-shop btn-ship-to-this-address @{{#unless is_shipping }} btn-black-custom @{{/unless}}">Ship To Address</a>
                    </span>
                    <span class="card-action">
                        <a href="#" class="btn btn-small btn-edit-shop btn-custom-shop btn-edit-shipping-address">Edit</a>
                    </span>
                    @{{#unless is_default }}
                        <span class="card-action">
                            <a href="#" class="btn btn-small btn-edit-shop btn-custom-shop btn-delete-shipping-address">Delete</a>
                        </span>
                    @{{/unless}}
                </div>
            </div>
        </div>
    @{{/each}}
</div>
<div class="action-address-shipping-area">
    <span class="guide-custom">
        Do You Want To Ship To Other Address?
    </span>
    <span class="action-custom">
        <a href="#" class="btn-link new-shipping-address-action">Add New Shipping Address</a>
    </span>
</div>
