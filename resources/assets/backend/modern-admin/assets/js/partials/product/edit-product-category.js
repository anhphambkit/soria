import ViewEditModal from '@componentResources/view-edit-modal';
import message from '@helper/config/messages';
import JSLib from '@helper/util/js-lib';

let editProductCategoryForm = new ViewEditModal();
editProductCategoryForm.wrapper = '#edit-product-category';
editProductCategoryForm.submitBtn = '#update-product-category';
editProductCategoryForm.wrapperModal = '#modal-edit-product-category';
editProductCategoryForm.hasViewEditMode = true;
editProductCategoryForm.switchBtn = editProductCategoryForm.wrapperModal + ' [data-action="switch-mode"]';
editProductCategoryForm.successMessage = (new JSLib).format(message.UPDATE_SUCCESS, ['Product Category']);
editProductCategoryForm.url = URL.UPDATE_PRODUCT_CATEGORY;
editProductCategoryForm.method = "PATCH";
editProductCategoryForm.afterDone = (data) => {
    refreshManageProductCategoryTable();
};

let isClicked = false;
window.editProductCategory = function(element) {
    let id = $(element).attr('product-category-id');
    $('#modal-edit-product-category').modal('show');
    editProductCategoryForm.urlCancel = URL.DETAIL_PRODUCT_CATEGORY + "?id=" + id;
    editProductCategoryForm.beforeSubmit = () => {
        Object.assign(editProductCategoryForm.data, { id: id});
        return editProductCategoryForm.data;
    }
    // editProductCategoryForm.elementLoading = editProductCategoryForm.wrapper;
    // Handle event on form
    editProductCategoryForm.clearForm();
    editProductCategoryForm.cancel(true);
    editProductCategoryForm.switchMode(false);
    if (!isClicked) {
        isClicked = true;
        editProductCategoryForm.handleSwitchBtn();
        editProductCategoryForm.handleSubmit();
        editProductCategoryForm.handleCancel();
    }
}

