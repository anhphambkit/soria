import { HandlebarRender } from '@incResources/handlebarForm';
import { Handlebars, helperShop } from '@/client/wookie/assets/js/helper/helper-shop';
import { initFunctions } from '@supportResources/init-functions';
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

// Delete Address Shipping
$(document).on('click', '.btn-delete-shipping-address', function(e) {
    LoadingElementManual = '#content-cart-page';
    swal({
        title: 'Delete Address Book',
        icon: "warning",
        text: "Do You Want Delete This Address Book?",
        buttons: [true, "Delete"],
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
$(document).on('click', '.btn-edit-shipping-address', function(e) {
    $("#shipping-address-area").fadeOut();
    $(".edit-form-area").fadeIn();
});

