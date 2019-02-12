import { HandlebarRender } from '@incResources/handlebarForm';
import { Handlebars, helperShop } from './../helper/helper-shop';
import { initFunctions } from '@supportResources/init-functions';
import axios from 'axios';
axios.defaults.withCredentials = true;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/* register handlebar */
let cartPageClass = new HandlebarRender();
cartPageClass.setSourceElement('#template-shop-cart-table');
cartPageClass.setTemplateElement('#content-cart-page');
cartPageClass.afterParseTemplate(() => {
    $('[data-toggle="tooltip"]').tooltip();
    ttInputCounter();
});

// Loaded Dom:
$(document).ready(function () {

});

$(document).on('change', '.input-quantity-product.cart-page', function(e) {

    // alert(1);
    LoadingElementManual = '#content-cart-page';
    manualLoading();

    let products = {};
    let newProduct = {};
    let productId = $(this).data('product-id');
    newProduct[productId] =$(this).val();
    products = Object.assign(products, newProduct);

    let request = axios.post(API_SHOP.ADD_TO_CART, { 'products' : products, 'is_update_product' : true });

    request
        .then(function(data){
            if (data.data.status === 0 || data.data.status === 1412) {
                helperShop.updataBasicInfoCartHeader(data.data.data.total_items);
                cartPageClass.setData(data.data.data);
                cartPageClass.parseTemplate();
                initFunctions.ttInputCounter($('.tt-input-counter'));
                manualLoaded();
            }
            else { // Custom Error
                toastr.error(data.data.message)
            }
        })
        .catch(function(error){
            toastr.error(error)
        })
        .then(function(data){ // Finally
        });
});