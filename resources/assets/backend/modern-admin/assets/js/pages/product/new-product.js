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
productForm.beforeSubmit = () => {
    let desc  = CKEDITOR.instances.desc.getData();
    let long_desc  = CKEDITOR.instances.long_desc.getData();
    let is_publish = $('#is_publish')[0].checked;
    let is_feature = $('#is_feature')[0].checked;
    let is_best_seller = $('#is_best_seller')[0].checked;
    let is_free_ship = $('#is_free_ship')[0].checked;
    let allow_order = $('#allow_order')[0].checked;
    let manager_stock = $('#manager_stock')[0].checked;
    let categories = $('#category_id').val();

    productForm.data.desc = desc;
    productForm.data.long_desc = desc;
    productForm.data.is_publish = is_publish;
    productForm.data.is_feature = is_feature;
    productForm.data.is_best_seller = is_best_seller;
    productForm.data.is_free_ship = is_free_ship;
    productForm.data.allow_order = allow_order;
    productForm.data.manager_stock = manager_stock;
    productForm.data.category_id = categories;
    return productForm.data;
};

productForm.afterDone = () => {
    CKEDITOR.instances.desc.setData('');
    CKEDITOR.instances.long_desc.setData('');
    helper.removeElements("#bb-widget-attachments-images-feature .bb-file");
    helper.removeElements("#bb-widget-attachments-images-gallery .bb-file");
    $('#category_id').val(null).trigger('change');
    helper.resetDefaultDataSwitchery('#is_publish', false)
    helper.resetDefaultDataSwitchery('#is_feature', false)
    helper.resetDefaultDataSwitchery('#is_best_seller', false)
    helper.resetDefaultDataSwitchery('#is_free_ship', false)
    helper.resetDefaultDataSwitchery('#allow_order', true)
    helper.resetDefaultDataSwitchery('#manager_stock', true)
    refreshManageProductTable()
    if ($('#modal-create-product').length) $('#modal-create-product').modal('hide')
};


// Define Slug
let slug = new Slug();
slug.init();