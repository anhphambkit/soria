import { HandlebarRender } from '@incResources/handlebarForm';
import { Handlebars, helperShop } from '@/client/wookie/assets/js/helper/helper-shop';
import { initFunctions } from '@supportResources/init-functions';
import Form from '@incResources/form';
import AddressForm from '@componentResources/address-form';
import axios from "axios";
axios.defaults.withCredentials = true;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/* register handlebar */
let checkoutShippingAddress = new HandlebarRender();
checkoutShippingAddress.setSourceElement('#template-checkout-shipping-address');
checkoutShippingAddress.setTemplateElement('#shipping-address-area');
checkoutShippingAddress.afterParseTemplate(() => {
    $('[data-toggle="tooltip"]').tooltip();
});

window.refreshListShippingAddress = function (data) {
    checkoutShippingAddress.setData(data);
    checkoutShippingAddress.parseTemplate();
};

// Loaded Dom:
$(document).ready(function () {

});

// Ship To This Address:
$(document).on('click', '.btn-ship-to-this-address', function(e) {
    LoadingElementManual = '#content-cart-page';
    manualLoading();
    let addressId = $(this).parents('.card-address').data('address-id');
    let data = {
        'address_id' : addressId
    };

    axios.post(API_CHECKOUT.SHIP_TO_THIS_ADDRESS, data).then( (res) => {
        if (res.data.status === 0) {
            window.location.href = "/shop/checkout/payment";
        }
        else {
            toastr.error(res.data.message);
        }
    }).catch(function(error){
        toastr.error(error)
        manualLoaded();
    }).then(function(){
    });
});

// Delete Address Shipping
$(document).on('click', '.btn-delete-shipping-address', function(e) {
    LoadingElementManual = '#content-cart-page';
    swal({
        title: 'Xóa sổ địa chỉ',
        icon: "warning",
        text: "Bạn thực sự muốn xóa sổ địa chỉ này?",
        buttons: [true, "Xóa"],
        dangerMode: true,
    }).then((confirm) => {
        if (confirm) {
            manualLoading();
            let addressId = $(this).parents('.card-address').data('address-id');
            let data = {
                'address_id' : addressId
            };
            axios.post(API_CHECKOUT.DELETE_ADDRESS_SHIPPING, data).then( (res) => {
                if (res.data.status === 0) {
                    refreshListShippingAddress(res.data.data);
                    toastr.success(res.data.message);
                }
                else {
                    toastr.error(res.data.message);
                }
            })
        }
    }).catch(function(error){
        toastr.error(error)
    }).then(function(){
        manualLoaded();
    });
});

// New Address Shipping
$(document).on('click', '.new-shipping-address-action', function(e) {
    $("#shipping-address-area").fadeOut();
    $(".new-form-area").fadeIn();
});

// Edit Address Shipping
let addressEditRegister = new AddressForm();
addressEditRegister.wrapperProvinceCity = '#province_city_update';
addressEditRegister.wrapperDistrict = '#district_update';
addressEditRegister.wrapperWard = '#ward_update';
addressEditRegister.wrapperMobilePhone = '#mobile_phone_update';
addressEditRegister.apiRefreshDistricts = API_ADDRESS.REFRESH_DISTRICTS;
addressEditRegister.apiRefreshWards = API_ADDRESS.REFRESH_WARDS;
addressEditRegister.init();

// Define Form
let editAddressForm = new Form();
editAddressForm.wrapper = '#form-update-address';
editAddressForm.url = API_CHECKOUT.UPDATE_ADDRESS_SHIPPING;
editAddressForm.urlCancel = "#";

// Handle event on form
editAddressForm.cancel = () => {
    editAddressForm.resetErrors();
    $(".edit-form-area").fadeOut();
    $("#shipping-address-area").fadeIn();
};

// Handle event on form
editAddressForm.handleSubmit();
editAddressForm.handleCancel();
editAddressForm.beforeSubmit = () => {
    Object.assign(editAddressForm.data, { id: currentEditAddressId });
    return editAddressForm.data;
};

editAddressForm.afterDone = (data) => {
    refreshListShippingAddress(data.data.data);
    addressEditRegister.resetDefaultData();
    $(".edit-form-area").fadeOut();
    $("#shipping-address-area").fadeIn();
};

let currentEditAddressId = 0;

// Edit Address Shipping
$(document).on('click', '.btn-edit-shipping-address', function(e) {
    LoadingElementManual = '#content-cart-page';
    manualLoading();
    currentEditAddressId = $(this).parents('.card-address').data('address-id');
    let data = {
        'address_id' : currentEditAddressId
    };

    axios.get(API_CHECKOUT.DETAIL_ADDRESS_SHIPPING, { params: data }).then( (res) => {
        if (res.data.status === 0) {
            editAddressForm.mapField(res.data.data)
            $("#shipping-address-area").fadeOut();
            $(".edit-form-area").fadeIn();
        }
        else {
            toastr.error(res.data.message);
        }
    }).catch(function(error){
        toastr.error(error)
    }).then(function(){
        manualLoaded();
    });
});

