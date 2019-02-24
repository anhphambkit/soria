import axios from "axios";
import {helperShop} from "@/client/wookie/assets/js/helper/helper-shop";

window.addToCartFromDetail = function (productId) {
    LoadingElementManual = '#modalAddToCartProduct .modal-content';
    manualLoading();
    let products = {};
    let newProduct = {};
    let quantity = $('.quantity-product-detail').val();
    newProduct[productId] = quantity;
    products = Object.assign(products, newProduct);

    let request = axios.post(API_SHOP.ADD_TO_CART, { 'products' : products, 'is_update_product' : false });
    request
        .then(function(data){
            if (data.data.status === 0) {
                let totalItems = data.data.data.total_items;
                helperShop.updataBasicInfoCartHeader(totalItems); // Update UI cart number
                manualLoaded();
                toastr.success(data.data.message)
            }
            else { // Custom Error
                toastr.error(data.data.message)
            }
        })
        .catch(function(error){
            toastr.error(error)
        })
        .then(function(data){ // Finally
            $('#loader-wrapper').removeClass('loader-custom');
            $('body').addClass('loaded');
        });
}