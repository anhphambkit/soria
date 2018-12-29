import Form from '@incResources/form';
import Slug from "@/general/js/support/auto-slug";
import helper from "@helper/helper"

$('document').ready(function () {
    $('#type_article').change(function() {
        let postType = $('#type_article :selected').text();
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

// Define Form
let postForm = new Form();
postForm.wrapper = '#form-create-new-post';
postForm.url = URL.CREATE_POST;
postForm.urlCancel = "#";

// Handle event on form
postForm.handleSubmit();
postForm.handleCancel();
// postForm.beforeSubmit = () => {
// };

postForm.afterDone = () => {
    refreshManagePostTable();
};

window.closeModal = function() {
    if ($('#modal-create-post').length) $('#modal-create-post').modal('hide')
}

// Define Slug
let slug = new Slug();
slug.init();