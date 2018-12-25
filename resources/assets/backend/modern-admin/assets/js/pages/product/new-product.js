import Form from '@incResources/form';
import Slug from "@/general/js/support/auto-slug";
import helper from "@helper/helper"

// Define Form
let productForm = new Form();
productForm.wrapper = '#form-create-new-product';
productForm.url = URL.CREATE_PRODUCT;
productForm.urlCancel = "#";

// Handle event on form
productForm.handleSubmit();
productForm.handleCancel();
// productForm.beforeSubmit = () => {
// };

// productForm.afterDone = () => {
// };

window.closeModal = function() {
    if ($('#modal-create-product').length) $('#modal-create-product').modal('hide')
}

// Define Slug
let slug = new Slug();
slug.init();