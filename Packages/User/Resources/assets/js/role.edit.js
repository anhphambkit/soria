import Form from '@theme/inc/form';

// Config user form for submit profile
let roleForm = new Form();
roleForm.wrapper = '#form-update-role';

roleForm.url = api.role.update;
roleForm.urlCancel = api.role.get;

roleForm.afterDone = (data) => {
    toastr.success('Update success');
};

roleForm.beforeSubmit = () => {
};

roleForm.afterCancel = (data) => {
    let _data = data.data;
    // map permissions
    $('input[id^="permission"]').prop('checked', false);
    _data.permissions.forEach(permission => {
        $('#permission_' + permission).prop('checked', true);
    });
};

// Handle event on form
roleForm.handleSubmit();
roleForm.handleCancel();

$('#role-name').on('keyup', function(){
    this.value = this.value.toUpperCase();
});
