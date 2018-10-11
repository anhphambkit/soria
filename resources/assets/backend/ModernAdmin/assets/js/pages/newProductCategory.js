import Form from '@incResources/form';
import responeForm from '@incResources/responeForm';
import message from '@/general/js/config/message';
import JSLib from '@incResources/js-lib';
// updatedMess = (new JSLib).format(message.UPDATE_SUCCESS, ['Basic Config']);
// Config user form for submit profile
let roleForm = new Form();
roleForm.wrapper = '#form-create-new-category';

roleForm.url = PRODUCT_API.CREATE_CATEGORY;
roleForm.urlCancel = "#";

roleForm.afterDone = (data) => {
    let response = new responeForm;
    response.init(data);
};

roleForm.beforeSubmit = () => {
};

roleForm.afterCancel = (data) => {
};

// Handle event on form
roleForm.handleSubmit();
roleForm.handleCancel();
