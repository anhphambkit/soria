import ViewEditModal from '@componentResources/view-edit-modal';
import message from '@helper/config/messages';
import JSLib from '@helper/util/js-lib';

$('document').ready(function () {
    $('#type_article-edit').change(function() {
        let postType = $('#type_article-edit :selected').text();
        switch ($.trim(postType.toLowerCase())) {
            case "gallery":
                // Hide:
                $('.image-slides-upload').addClass('d-none');
                $('.media-feature-upload').addClass('d-none');
                // Show:
                $('.image-feature-upload').removeClass('d-none');
                $('.image-secondary-upload').removeClass('d-none');
                break;
            case "slide":
                // Hide:
                $('.image-secondary-upload').addClass('d-none');
                $('.media-feature-upload').addClass('d-none');
                // Show:
                $('.image-feature-upload').removeClass('d-none');
                $('.image-slides-upload').removeClass('d-none');
                break;
            case "video":
                // Hide:
                $('.image-slides-upload').addClass('d-none');
                $('.image-feature-upload').addClass('d-none');
                $('.image-secondary-upload').addClass('d-none');
                // Show:
                $('.media-feature-upload').removeClass('d-none');
                break;
            case "audio":
                // Hide:
                $('.image-slides-upload').addClass('d-none');
                $('.image-feature-upload').addClass('d-none');
                $('.image-secondary-upload').addClass('d-none');
                // Show:
                $('.media-feature-upload').removeClass('d-none');
                break;
            default:
                // Hide:
                $('.image-slides-upload').addClass('d-none');
                $('.media-feature-upload').addClass('d-none');
                $('.image-secondary-upload').addClass('d-none');
                // Show:
                $('.image-feature-upload').removeClass('d-none');
                break;
        }
    });
});

let editPostForm = new ViewEditModal();
editPostForm.wrapper = '#edit-post';
editPostForm.submitBtn = '#update-post';
editPostForm.wrapperModal = '#modal-edit-post';
editPostForm.hasViewEditMode = true;
editPostForm.switchBtn = editPostForm.wrapperModal + ' [data-action="switch-mode"]';
editPostForm.successMessage = (new JSLib).format(message.UPDATE_SUCCESS, ['Post']);
editPostForm.url = URL.UPDATE_POST;
editPostForm.method = "PATCH";
editPostForm.afterDone = (data) => {
    refreshManagePostTable();
};

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
    editPostForm.switchMode(true);
    editPostForm.clearForm(false, false);
    editPostForm.cancel(true).then(() => {
        editPostForm.switchMode(false);
    });

    if (!isClicked) {
        isClicked = true;
        editPostForm.handleSwitchBtn();
        editPostForm.handleSubmit();
        editPostForm.handleCancel();
    }
}
