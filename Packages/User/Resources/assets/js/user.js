import Form from '@theme/inc/form';
import message from '@theme/config/message';
import JSLib from '@theme/inc/js-lib';

// Config user form for submit profile
let userForm = new Form();
userForm.wrapper = '#form-update-profile';
userForm.url = api.user.update;
userForm.urlCancel = api.user.get;

userForm.beforeSubmit = () => {};

userForm.afterDone = (data) => {
    let successMess = (new JSLib).format(message.UPDATE_SUCCESS, ['User']);
    toastr.success(successMess);
};

userForm.afterCancel = (data) => {
};

// Handle event on form
userForm.handleSubmit();
userForm.handleCancel();


// Config user form for submit role
let userRoleForm = new Form();
userRoleForm.wrapper = '#form-role-profile';
userRoleForm.url = api.role.update;
userRoleForm.urlCancel = api.role.get;

userRoleForm.beforeSubmit = () => {};
userRoleForm.afterDone = (data) => {
    let successMess = (new JSLib).format(message.UPDATE_SUCCESS, ['Role']);
    toastr.success(successMess);
};

userRoleForm.afterCancel = (data) => {};

// Handle event on form
userRoleForm.handleSubmit();
userRoleForm.handleCancel();
