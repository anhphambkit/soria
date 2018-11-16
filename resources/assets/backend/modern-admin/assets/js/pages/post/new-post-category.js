import Form from '@incResources/form';
import Slug from '@supportResources/auto-slug'
// Define Form
let categoryForm = new Form();
categoryForm.wrapper = '#form-create-new-category';
categoryForm.url = URL.CREATE_CATEGORY;
categoryForm.urlCancel = "#";

// Handle event on form
categoryForm.handleSubmit();
categoryForm.handleCancel();
categoryForm.afterDone = () => {
    refreshManagePostCategoryTable()
    if ($('#modal-create-post-category').length) $('#modal-create-post-category').modal('hide')
};

// Define Slug
let slug = new Slug();
slug.init();