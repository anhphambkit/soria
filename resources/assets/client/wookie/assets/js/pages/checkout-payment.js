import axios from "axios";
axios.defaults.withCredentials = true;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Ship To This Address:
$(document).on('click', '.btn-checkout-order', function(e) {
    LoadingElementManual = '#content-payment-page';
    manualLoading();
    let shippingMethod = $('input[name="shipping_method"]').val();
    let paymentMethod = $('input[name="payment_method"]').val();
    let data = {
        'shipping_method' : shippingMethod,
        'payment_method' : paymentMethod,
    };

    axios.post(API_CHECKOUT.ORDER, data).then( (res) => {
        if (res.data.status === 0) {
            window.location.href = "/shop/complete-order";
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