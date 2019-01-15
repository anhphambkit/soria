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

productForm.afterDone = () => {
    refreshProductsTable();
    if ($('#modal-create-product').length) $('#modal-create-product').modal('hide')
};

window.closeModal = function() {
    if ($('#modal-create-product').length) $('#modal-create-product').modal('hide')
}

// Define Slug
let slugProduct = new Slug();
// U must define correct wrapper whenever use this
slugProduct.wrapper = '#slug[data-type="slug"]';
// Data generate auto from input:
slugProduct.fromInput = '#name[data-type="source-slug"]';
slugProduct.init();