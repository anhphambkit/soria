import Form from '@incResources/form';
// Define Form
let productForm = new Form();
productForm.wrapper = '#form-create-new-product';
productForm.url = '#';
productForm.urlCancel = "#";

// Handle event on form
productForm.handleSubmit();
productForm.handleCancel();
productForm.afterDone = () => {
    // refreshManageProductCategoryTable()
    // if ($('#modal-create-product-category').length) $('#modal-create-product-category').modal('hide')
};