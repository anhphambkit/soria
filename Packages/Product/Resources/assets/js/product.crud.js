import StringUtil from '@theme/util/string-util';
import Form from '@theme/inc/form';
import WindowUtil from '@theme/util/window';
import message from '@theme/config/message';
import JSLib from '@theme/inc/js-lib';
import ProductImage from './inc/product-image';

let productForm = new Form();
window.productImage = new ProductImage();
let productNameCtrl = $('#product-name');
let productSlugCtrl = $('#product-slug');
let productKeywordsCtrl = $('#product-keywords');

// FORM
productForm.wrapper = '#product-form';
productForm.url = updateMode ? api.product.update : api.product.create;

productForm.beforeSubmit = () => {
    productForm.data.img_id = productImage.thumbImg == null ? null : productImage.thumbImg.id;
    productForm.data.related_img = productImage.relatedImg.map( img => img.id );
    productForm.data.long_desc = tinyMCE.get('product-content').getContent();
    productForm.data.desc = tinyMCE.get('product-short-desc').getContent();
    productForm.data.is_feature = productForm.data.is_feature === 'on';
    productForm.data.is_best_seller = productForm.data.is_best_seller === 'on';
    productForm.data.is_free_ship = productForm.data.is_free_ship === 'on';
};
productForm.afterDone = (data) => {
    let successMess = (new JSLib).format(message.CREATED_SUCCESS, ['Product']);
    if(updateMode){
        successMess = (new JSLib).format(message.UPDATE_SUCCESS, ['Product']);
    }
    toastr.success(successMess);
};

productForm.afterCancel = (data) => {
};

// Handle event on form
productForm.handleSubmit();
// END FORM

// Register Event
$(document).ready(function(){
    // Register Event Handler for Product Name (Add/Edit)
    productNameCtrl.on('change', function(){
        // auto generate slug after category name change
        let val = $(this).val();
        if(val.trim().length > 0){
            let stringUtil = new StringUtil();
            productSlugCtrl.val(stringUtil.generateSlug(val));
            productKeywordsCtrl.val(stringUtil.generateSlug(val).replace(/-/g, ' '));

            // Trigger change event
            productSlugCtrl.trigger('change');
            productKeywordsCtrl.trigger('change');
        }
    });

    // update UI when edit mode
    if(updateMode){
        productImage.thumbImg = product.thumbImg;
        productImage.relatedImg = product.relatedImg;
        productImage.parseTemplate(true);
        productImage.parseTemplate(false);
    }
});

window.addSingleFile = true;

/**
 * Receive data from Media popup
 * @param mediaId
 * @param orgLink
 * @param mediumLink
 * @param smallLink
 */
window.attachMedia = (mediaId, orgLink, mediumLink = null, smallLink = null) => {
    if(addSingleFile){
        productImage.attachThumbnail(mediaId, orgLink, mediumLink, smallLink);
    } else {
        productImage.attachRelated(mediaId, orgLink, mediumLink, smallLink);
    }
};
window.windowUtil = new WindowUtil();
