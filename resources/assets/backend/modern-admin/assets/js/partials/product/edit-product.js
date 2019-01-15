import ViewEditModal from '@componentResources/view-edit-modal';
import message from '@helper/config/messages';
import JSLib from '@helper/util/js-lib';
import Slug from "@/general/js/support/auto-slug";

let editProductForm = new ViewEditModal();
editProductForm.wrapper = '#edit-product';
editProductForm.submitBtn = '#update-product';
editProductForm.wrapperModal = '#modal-edit-product';
editProductForm.hasViewEditMode = true;
editProductForm.switchBtn = editProductForm.wrapperModal + ' [data-action="switch-mode"]';
editProductForm.successMessage = (new JSLib).format(message.UPDATE_SUCCESS, ['Product']);
editProductForm.url = URL.UPDATE_PRODUCT;
editProductForm.method = "PATCH";
editProductForm.afterDone = (data) => {
    refreshProductsTable();
};

let isClicked = false;
window.editProduct = function(element) {
    let id = $(element).attr('product-id');
    $('#modal-edit-product').modal('show');
    editProductForm.urlCancel = URL.DETAIL_PRODUCT + "?id=" + id;
    editProductForm.beforeSubmit = () => {
        Object.assign(editProductForm.data, { id: id});
        return editProductForm.data;
    }
    // editProductForm.elementLoading = editProductForm.wrapper;
    // Handle event on form
    editProductForm.switchMode(true);
    editProductForm.clearForm(false, false);
    editProductForm.cancel(true).then(() => {
        editProductForm.switchMode(false);
    });

    if (!isClicked) {
        isClicked = true;
        editProductForm.handleSwitchBtn();
        editProductForm.handleSubmit();
        editProductForm.handleCancel();
    }
}

// Define Slug
let slugEditProduct = new Slug();
// U must define correct wrapper whenever use this
slugEditProduct.wrapper = '#slug-edit[data-type="slug"]';
// Data generate auto from input:
slugEditProduct.fromInput = '#name-edit[data-type="source-slug"]';
slugEditProduct.init();