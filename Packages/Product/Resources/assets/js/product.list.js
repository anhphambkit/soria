import messageConfig from '@theme/config/message';
import JSLib from '@theme/inc/js-lib';

window.removeProduct = function(productId, productName){
    swal({
        title: (new JSLib).format(message.deleteTitle, [productName]),
        text: message.deleteContent,
        type:"warning",
        showCancelButton:true,
        confirmButtonClass:"btn btn-confirm mt-2",
        cancelButtonClass:"btn btn-cancel ml-2 mt-2",
        confirmButtonText: message.deleteBtn
    })
    .then(function() {
        axios.delete(api.product.delete, { params: { id: productId }}).then( () => {
            swal("Completed", (new JSLib).format(messageConfig.DELETED_SUCCESS, ['Product']), "success");
            location.reload();
        });
    }).catch(function(){});
};