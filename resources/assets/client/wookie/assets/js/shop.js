import axios from 'axios';
axios.defaults.withCredentials = true;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.addToCart = function (productId) {
    let products = {};
    let newProduct = {};
    newProduct[productId] = 1;
    products = Object.assign(products, newProduct);
    let request = axios.post(API_SHOP.ADD_TO_CART, { 'products' : products });
    request
        .then(function(data){
            if (data.data.status === 1412) {
                if (localStorage) {
                    // LocalStorage is supported
                    updateCart(productId);
                }
                toastr.success("Added to cart successfully!")
            }
            else if (data.data.status === 0) {
                toastr.success("Added to cart successfully!")
            }
            else { // Custom Error
                toastr.error(data.data.message)
            }
        })
        .catch(function(error){
            toastr.error("Please contact IT Admin to help!")
        })
        .then(function(data){ // Finally

        });
}

window.updateCart = function (productId) {
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
}