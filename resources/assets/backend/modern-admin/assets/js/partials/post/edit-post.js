import ViewEditModal from '@componentResources/view-edit-modal';
import message from '@helper/config/messages';
import JSLib from '@helper/util/js-lib';

let editPostForm = new ViewEditModal();
editPostForm.wrapper = '#edit-post';
editPostForm.submitBtn = '#update-post';
editPostForm.wrapperModal = '#modal-edit-post';
editPostForm.hasViewEditMode = true;
editPostForm.switchBtn = editPostForm.wrapperModal + ' [data-action="switch-mode"]';
editPostForm.successMessage = (new JSLib).format(message.UPDATE_SUCCESS, ['Post']);
editPostForm.url = URL.UPDATE_POST;
editPostForm.method = "PATCH";
// editPostForm.afterDone = (data) => {
// };

let isClicked = false;
window.editPost = function(element) {
    let id = $(element).attr('post-id');
    $('#modal-edit-post').modal('show');
    editPostForm.urlCancel = URL.DETAIL_POST + "?id=" + id;
    editPostForm.beforeSubmit = () => {
        Object.assign(editPostForm.data, { id: id});
        return editPostForm.data;
    }
    // editPostForm.elementLoading = editPostForm.wrapper;
    // Handle event on form
    editPostForm.clearForm(false, false);
    editPostForm.cancel(true);
    editPostForm.switchMode(false);
    if (!isClicked) {
        isClicked = true;
        editPostForm.handleSwitchBtn();
        editPostForm.handleSubmit();
        editPostForm.handleCancel();
    }
}
