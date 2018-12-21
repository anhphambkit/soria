import Form from '@incResources/form';
import Slug from "@/general/js/support/auto-slug";
import helper from "@helper/helper"

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

// postForm.afterDone = () => {
// };

window.closeModal = function() {
    if ($('#modal-create-post').length) $('#modal-create-post').modal('hide')
}

// Define Slug
let slug = new Slug();
slug.init();