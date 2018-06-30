import Form from '@theme/inc/form';
import message from '@theme/config/message';
import JSLib from '@theme/inc/js-lib';

// Config user form for submit profile
let generalForm = new Form();
generalForm.wrapper = '#form-update-general';
generalForm.url = api.general.update;

generalForm.beforeSubmit = () => {};

generalForm.afterDone = (data) => {
    let successMess = (new JSLib).format(message.UPDATE_SUCCESS, ['Config']);
    toastr.success(successMess);
};

generalForm.afterCancel = (data) => {
};

// Handle event on form
generalForm.handleSubmit();
generalForm.handleCancel();