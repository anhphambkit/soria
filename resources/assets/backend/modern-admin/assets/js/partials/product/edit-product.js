import ViewEditModal from '@componentResources/view-edit-modal';
import message from '@helper/config/messages';
import JSLib from '@helper/util/js-lib';

let editProductForm = new ViewEditModal();
editProductForm.wrapper = '#edit-product';
editProductForm.submitBtn = '#update-product';
editProductForm.wrapperModal = '#modal-edit-product';
editProductForm.hasViewEditMode = true;
editProductForm.switchBtn = editProductForm.wrapperModal + ' [data-action="switch-mode"]';
editProductForm.successMessage = (new JSLib).format(message.UPDATE_SUCCESS, ['Product']);
editProductForm.url = URL.UPDATE_PRODUCT;
editProductForm.method = "PATCH";
// editProductForm.afterDone = (data) => {
// };

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
    editProductForm.clearForm(false, false);
    editProductForm.cancel(true);
    editProductForm.switchMode(false);
    if (!isClicked) {
        isClicked = true;
        editProductForm.handleSwitchBtn();
        editProductForm.handleSubmit();
        editProductForm.handleCancel();
    }
}
