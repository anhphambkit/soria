import StringUtil from '@theme/util/string-util';
import Form from '@theme/inc/form';
import message from '@theme/config/message';
import JSLib from '@theme/inc/js-lib';
import axios from 'axios';

let catForm = new Form();
let catNameCtrl = $('#cat-name');
let catSlugCtrl = $('#cat-slug');
let catParentCtrl = $('#parent-category');
let submitCtrl = $('#submit-category');
let tblCategory = $('#tbl-category');

catForm.wrapper = '#category-form';
catForm.url = api.cat.create;
catForm.restoreWhenCancel = false;
// Trigger change all controls on the form
catForm.updateUI = () => {
    catNameCtrl.trigger('change');
    catSlugCtrl.trigger('change');
    catParentCtrl.trigger('change');
};
catForm.beforeSubmit = () => {
    if(updateMode){
        catForm.url = api.cat.update + '/' + updateId;
    } else {
        catForm.url = api.cat.create;
    }
    if(catForm.data.parent_id == 0 || catForm.data.parent_id === '0'){
        catForm.data.parent_id = undefined;
    }
};
catForm.afterDone = (data) => {
    let successMess = (new JSLib).format(message.CREATED_SUCCESS, ['Category']);
    if(updateMode){
        successMess = (new JSLib).format(message.UPDATE_SUCCESS, ['Category']);
    }
    toastr.success(successMess);
    window.location.reload();
};
catForm.afterCancel = (data) => {
    catNameCtrl.val('');
    catSlugCtrl.val('');
    catForm.updateUI();
};
// Handle event on form
catForm.handleSubmit();
catForm.handleCancel();


$(document).ready(function(){
    $('select').select2({
        dropdownParent: $('#category-form')
    });

    tblCategory.DataTable();

    // // Register Event Handler for Category Name (Add/Edit)
    // catNameCtrl.on('change', function(){
    //     // auto generate slug after category name change
    //     let val = $(this).val();
    //     if(val.trim().length > 0){
    //         let stringUtil = new StringUtil();
    //         catSlugCtrl.val(stringUtil.generateSlug(val));
    //     }
    // });
});

// Handle update form
window.updateMode = false;
window.updateId = null;
window.editCat = (id) => {
    window.updateMode = true;
    window.updateId = id;
    submitCtrl.text(text.update);
    axios.get(api.cat.get + '/' + id)
        .then(response => {
            let cat = response.data.data;
            catNameCtrl.val(cat.name);
            catSlugCtrl.val(cat.slug);
            catParentCtrl.val(cat.parent_id == null ? 0 : cat.parent_id);
            catForm.updateUI();
            modal.open();
        })
        .catch(function(data){

        });
};

window.newCat = () => {
    window.updateMode = false;
    window.updateId = null;
    submitCtrl.text(text.add);
};

window.deleteCat = (id, name) => {
    swal({
        title: (new JSLib).format(text.deleteTitle, [name]),
        text: text.deleteContent,
        type:"warning",
        showCancelButton:true,
        confirmButtonClass:"btn btn-confirm mt-2",
        cancelButtonClass:"btn btn-cancel ml-2 mt-2",
        confirmButtonText: text.deleteBtn
    })
        .then(function() {
            axios.delete(api.cat.delete, { params: { id }}).then( () => {
                swal("Completed", (new JSLib).format(message.DELETED_SUCCESS, ['Category']), "success");
                location.reload();
            });
        }).catch(function(){});
};


