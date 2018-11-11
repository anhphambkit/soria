import Form from '@incResources/form';
import Slug from "@/general/js/support/auto-slug";
// Define Form
let productForm = new Form();
productForm.wrapper = '#form-create-new-product';
productForm.url = URL.CREATE_PRODUCT;
productForm.urlCancel = "#";

// Handle event on form
productForm.handleSubmit();
productForm.handleCancel();
productForm.beforeSubmit = () => {
    let desc  = CKEDITOR.instances.desc.getData();
    let long_desc  = CKEDITOR.instances.long_desc.getData();
    let is_publish = $('#is_publish')[0].checked;
    let is_feature = $('#is_feature')[0].checked;
    let is_best_seller = $('#is_best_seller')[0].checked;
    let is_free_ship = $('#is_free_ship')[0].checked;
    let allow_order = $('#allow_order')[0].checked;
    let manager_stock = $('#manager_stock')[0].checked;

    productForm.data.desc = desc;
    productForm.data.long_desc = desc;
    productForm.data.is_publish = is_publish;
    productForm.data.is_feature = is_feature;
    productForm.data.is_best_seller = is_best_seller;
    productForm.data.is_free_ship = is_free_ship;
    productForm.data.allow_order = allow_order;
    productForm.data.manager_stock = manager_stock;
    return productForm.data;
};

// Define Slug
let slug = new Slug();
slug.init();