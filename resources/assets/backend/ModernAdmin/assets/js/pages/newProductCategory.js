import Form from '@theme/inc/form';
import message from '@theme/config/message';
import JSLib from '@theme/inc/js-lib';
// updatedMess = (new JSLib).format(message.UPDATE_SUCCESS, ['Basic Config']);
// Config user form for submit profile
let roleForm = new Form();
roleForm.wrapper = '#form-create-new-category';

roleForm.url = apiConfigBasic.update;
roleForm.urlCancel = apiConfigBasic.get;

roleForm.afterDone = (data) => {
    let updatedMess = (new JSLib).format(message.UPDATE_SUCCESS, ['Basic Config']);
    toastr.success(updatedMess);
};

roleForm.beforeSubmit = () => {
};

roleForm.afterCancel = (data) => {
    let _data = data.data;
    // map configs:
    _data.forEach(config => {
        $('#config_' + config.slug).val(config.value);
    });
};

// Handle event on form
roleForm.handleSubmit();
roleForm.handleCancel();
