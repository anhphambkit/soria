import StringUtil from '@theme/util/string-util';
import Form from '@theme/inc/form';
import message from '@theme/config/message';
import JSLib from '@theme/inc/js-lib';
import OrderProducts from './order-products';

$.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
let orderForm = new Form();
window.orderProducts = new OrderProducts();
orderProducts.products = products;
orderProducts.feeship = $('#fee-ship').val();
orderProducts.tax = $('#order-tax').val();
orderProducts.apiCalBilling = api.order.calBilling;
orderProducts.parseTemplate();
// FORM
orderForm.wrapper = '#order-form';
orderForm.url = updateMode ? api.order.update : api.order.create;

orderForm.beforeSubmit = () => {
    orderForm.data.products = orderProducts.products;
};
orderForm.afterDone = (data) => {
    let successMess = (new JSLib).format(message.CREATED_SUCCESS, ['order']);
    if(updateMode){
        successMess = (new JSLib).format(message.UPDATE_SUCCESS, ['order']);
    }
    toastr.success(successMess);
};

orderForm.afterCancel = (data) => {
};

// Handle event on form
orderForm.handleSubmit();
// END FORM


// Register Event
$(document).ready(function(){
});