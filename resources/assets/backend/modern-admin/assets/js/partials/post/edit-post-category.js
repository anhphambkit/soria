import ViewEditModal from '@componentResources/view-edit-modal';
import message from '@helper/config/messages';
import JSLib from '@helper/util/js-lib';

let editPostCategoryForm = new ViewEditModal();
editPostCategoryForm.wrapper = '#edit-post-category';
editPostCategoryForm.submitBtn = '#update-post-category';
editPostCategoryForm.wrapperModal = '#modal-edit-post-category';
editPostCategoryForm.hasViewEditMode = true;
editPostCategoryForm.switchBtn = editPostCategoryForm.wrapperModal + ' [data-action="switch-mode"]';
editPostCategoryForm.successMessage = (new JSLib).format(message.UPDATE_SUCCESS, ['Post Category']);
editPostCategoryForm.url = URL.UPDATE_POST_CATEGORY;
editPostCategoryForm.method = "PATCH";
editPostCategoryForm.afterDone = (data) => {
    refreshManagePostCategoryTable();
};

let isClicked = false;
window.editPostCategory = function(element) {
    let id = $(element).attr('post-category-id');
    $('#modal-edit-post-category').modal('show');
    editPostCategoryForm.urlCancel = URL.DETAIL_POST_CATEGORY + "?id=" + id;
    editPostCategoryForm.beforeSubmit = () => {
        Object.assign(editPostCategoryForm.data, { id: id});
        return editPostCategoryForm.data;
    }
    // editPostCategoryForm.elementLoading = editPostCategoryForm.wrapper;
    // Handle event on form
    editPostCategoryForm.clearForm();
    editPostCategoryForm.cancel(true);
    editPostCategoryForm.switchMode(false);
    if (!isClicked) {
        isClicked = true;
        editPostCategoryForm.handleSwitchBtn();
        editPostCategoryForm.handleSubmit();
        editPostCategoryForm.handleCancel();
    }
}

