import Form from '@incResources/form';
import responeForm from '@supportResources/respone-form';
import Slug from '@supportResources/auto-slug'
import message from '@helper/config/messages';
import JSLib from '@helper/util/js-lib';
// Define Form
let roleForm = new Form();
roleForm.wrapper = '#form-create-new-category';
roleForm.url = PRODUCT_API.CREATE_CATEGORY;
roleForm.urlCancel = "#";

// Handle event on form
roleForm.handleSubmit();
roleForm.handleCancel();

// Define Slug
let slug = new Slug();

slug.init();
