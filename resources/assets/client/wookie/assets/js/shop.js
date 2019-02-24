import { HandlebarRender } from '@incResources/handlebarForm';
import { Handlebars, helperShop } from './helper/helper-shop';
import axios from 'axios';
axios.defaults.withCredentials = true;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.viewCartHeader = function () {
    LoadingElementManual = '#cart-header-content';
    manualLoading();

    let request = axios.get(API_SHOP.VIEW_CART_HEADER);
    request
        .then(function(data){
            if (data.data.status === 0) {
                cartHeaderClass.setData(data.data.data);
                cartHeaderClass.parseTemplate();
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
}

window.addToCart = function (productId, quantity = 1, isShowModalCartInfo = true) {
    $('#loader-wrapper').addClass('loader-custom');
    $('body').removeClass('loaded');

    let products = {};
    let newProduct = {};
    newProduct[productId] = quantity;
    products = Object.assign(products, newProduct);

    let request = axios.post(API_SHOP.ADD_TO_CART, { 'products' : products, 'is_update_product' : false });
    request
        .then(function(data){
            if (data.data.status === 0) {
                let products = data.data.data.products;
                let totalItems = data.data.data.total_items;
                let totalPrice = data.data.data.total_price;
                let productDetail = products.find(product => product.id === productId);
                helperShop.updataBasicInfoCartHeader(totalItems); // Update UI cart number

                if (isShowModalCartInfo) { // Show modal info cart
                    $('#modalAddToCartProduct').modal('show');
                    LoadingElementManual = '#modalAddToCartProduct .modal-content';
                    manualLoading();

                    $('#modalAddToCartProduct').on('shown.bs.modal', function (e) {
                        // Update Modal Cart Info:
                        if (productDetail.medias.length > 0) {
                            let imgFeature = productDetail.medias[0];
                            $('.preview-product-feature').attr('src', imgFeature.path_org);
                            $('.preview-product-feature').attr('alt', imgFeature.filename);
                            $('.preview-product-feature').data('src', imgFeature.path_org);
                        }

                        $('.preview-product-title').text(productDetail.name);
                        $('.preview-product-title').attr('href', `/shop/product/detail/${productDetail.slug}.${productDetail.id}`);
                        $('.preview-product-title').text(productDetail.name);
                        $('.preview-product-quantity').text(quantity);
                        $('.preview-product-price').text(helperShop.currencyFormat(productDetail.price));
                        $('.modal-cart-info-total-items').text(totalItems);
                        $('.modal-cart-info-total-price').text(helperShop.currencyFormat(totalPrice));
                        manualLoaded();
                    })
                }
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

/* register handlebar */
let cartHeaderClass = new HandlebarRender();
cartHeaderClass.setSourceElement('#template-cart-header');
cartHeaderClass.setTemplateElement('#cart-header-content');

// Loaded Dom:
$(document).ready(function () {
   
});