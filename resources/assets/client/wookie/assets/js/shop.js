import axios from 'axios';
axios.defaults.withCredentials = true;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

$(document).ready(function () {
    let totalItems = JSON.parse(localStorage.getItem('totalItems')); // Get current totalItems
    if (totalItems !== undefined && totalItems !== null && totalItems > 0) { // Check total items
        $('.cart-header-items').text(totalItems);
        $('.cart-header-items').removeClass('d-none');
    }
    else {
        $('.cart-header-items').addClass('d-none');
    }
})

window.addToCart = function (productId, quantity = 1, isShowModalCartInfo = true) {
    let products = {};
    let newProduct = {};
    newProduct[productId] = quantity;
    products = Object.assign(products, newProduct);

    let cart = JSON.parse(localStorage.getItem('cart')); // Get current cart
    cart = (cart === undefined || cart === null) ? {} : cart;

    let request = axios.post(API_SHOP.ADD_TO_CART, { 'products' : products, 'cart' : cart });
    $('#loader-wrapper').addClass('loader-custom');
    $('body').removeClass('loaded');
    request
        .then(function(data){
            if (data.data.status === 0 || data.data.status === 1412) {
                toastr.success("Added to cart successfully!");
                let products = data.data.data.products;
                let totalItems = data.data.data.total_items;
                let totalPrice = data.data.data.total_price;
                let productDetail = products.find(product => product.id === productId);

                if (isShowModalCartInfo) { // Show modal info cart
                    $('#modalAddToCartProduct').modal('show');

                    $('#modalAddToCartProduct').on('shown.bs.modal', function (e) {
                        // Update Modal Cart Info:
                        if (productDetail.medias.length > 0) {
                            let imgFeature = productDetail.medias[0];
                            $('.preview-product-feature').attr('src', imgFeature.path_org);
                            $('.preview-product-feature').attr('alt', imgFeature.filename);
                            $('.preview-product-feature').data('src', imgFeature.path_org);
                        }

                        $('.preview-product-title').text(productDetail.name);
                        // $('.preview-product-title').attr('href', productDetail.name);
                        $('.preview-product-title').text(productDetail.name);
                        $('.preview-product-quantity').text(productDetail.quantity);
                        $('.preview-product-price').text(currencyFormat(productDetail.price));
                        $('.modal-cart-info-total-items').text(totalItems);
                        $('.cart-header-items').text(totalItems);
                        $('.cart-header-items').removeClass('d-none');
                        $('.modal-cart-info-total-price').text(currencyFormat(totalPrice));

                        $('#loader-wrapper').removeClass('loader-custom');
                        $('body').addClass('loaded');
                    })
                }

                if (data.data.status === 1412 && localStorage) { // Update/save data to local storage
                    // LocalStorage is supported
                    updateCart(productId, totalItems);
                }
            }
            else { // Custom Error
                toastr.error(data.data.message)
                $('#loader-wrapper').removeClass('loader-custom');
                $('body').addClass('loaded');
            }
        })
        .catch(function(error){
            toastr.error("Please contact IT Admin to help!")
            $('#loader-wrapper').removeClass('loader-custom');
            $('body').addClass('loaded');
        })
        .then(function(data){ // Finally
        });
}

window.updateCart = function (productId, totalItems) {
    let cart = JSON.parse(localStorage.getItem('cart')); // Get current cart
    let newProduct = {};
    if (cart === undefined || cart === null) { // Check cart
        newProduct[productId] = 1;
        cart = {};
    } else{
        if (!(productId in cart)) {
            newProduct[productId] = 1;
        }
        else {
            cart[productId]++;
        }
    }
    localStorage.setItem('cart', JSON.stringify(Object.assign(cart, newProduct)));
    localStorage.setItem('totalItems', totalItems);
}

window.currencyFormat = function (num) {
    return (
        num
            .toFixed(0) // always two decimal digits
            .replace('.', ',') // replace decimal point character with ,
            .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' đ'
    ) // use . as a separator
}