import StringUtil from '@theme/util/string-util';
import Form from '@theme/inc/form';
import message from '@theme/config/message';
import JSLib from '@theme/inc/js-lib';
import axios from 'axios';
import WindowUtil from '@theme/util/window';
import ManufacturerImage from './manufacturer-image';

window.windowUtil = new WindowUtil();

window.manufacturerImage = new ManufacturerImage();

let manufacturerForm = new Form();
let manufacturerNameCtrl = $('#manufacturer-name');
let manufacturerDescCtrl = $('#manufacturer-desc');
let manufacturerCountryCtrl = $('#manufacturer-country');
let submitCtrl = $('#submit-manufacturer');
let tblManufacturer = $('#tbl-manufacturer');

manufacturerForm.wrapper = '#manufacturer-form';
manufacturerForm.url = api.manufacturer.create;
manufacturerForm.restoreWhenCancel = false;
// Trigger change all controls on the form
manufacturerForm.updateUI = () => {
    manufacturerNameCtrl.trigger('change');
    manufacturerDescCtrl.trigger('change');
    manufacturerCountryCtrl.trigger('change');
    manufacturerImage.parseTemplate();
};
manufacturerForm.beforeSubmit = () => {
    if(updateMode){
        manufacturerForm.url = api.manufacturer.update + '/' + updateId;
    } else {
            manufacturerForm.url = api.manufacturer.create;
    }

    if(manufacturerImage.getImages()!= null){
        manufacturerForm.data.logo_id = manufacturerImage.getImages().id;
    } else {
        manufacturerForm.data.logo_id = null;
    }
};
manufacturerForm.afterDone = (data) => {
    let successMess = (new JSLib).format(message.CREATED_SUCCESS, ['Manufacturer']);
    if(updateMode){
        successMess = (new JSLib).format(message.UPDATE_SUCCESS, ['Manufacturer']);
    }
    toastr.success(successMess);
    window.location.reload();
};
manufacturerForm.afterCancel = (data) => {
};
// Handle event on form
manufacturerForm.handleSubmit();
manufacturerForm.handleCancel();


$(document).ready(function(){
    $('select').select2({
        dropdownParent: $('#manufacturer-form')
    });
    tblManufacturer.DataTable();
});

// Handle update form
window.updateMode = false;
window.updateId = null;
window.editManufacturer = (id) => {
    window.updateMode = true;
    window.updateId = id;
    submitCtrl.text(text.update);
    axios.get(api.manufacturer.get + '/' + id)
        .then(response => {
            let manufacturer = response.data.data;
            manufacturerNameCtrl.val(manufacturer.name);
            manufacturerDescCtrl.val(manufacturer.desc);
            manufacturerCountryCtrl.val(manufacturer.country);
            if(manufacturer.logo_id!= null && manufacturer.logo_link!=null) {
                manufacturerImage.images = [{id: manufacturer.logo_id, link: manufacturer.logo_link}];
            } else {
                manufacturerImage.images = [];
            }
            manufacturerForm.updateUI();
            Custombox.open({
                effect: 'blur',
                target: '#manufacturer-modal'
            });
        })
        .catch(function(data){

        });
};

window.newManufacturer = () => {
    window.updateMode = false;
    window.updateId = null;
    submitCtrl.text(text.add);
    manufacturerNameCtrl.val(null);
    manufacturerDescCtrl.val(null);
    manufacturerCountryCtrl.val(null);
    manufacturerImage.images = [];
    manufacturerForm.updateUI();
};

window.deleteManufacturer = (id, name) => {
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
            axios.delete(api.manufacturer.delete, { params: { id }}).then( () => {
                swal("Completed", (new JSLib).format(message.DELETED_SUCCESS, ['Manufacturer']), "success");
                location.reload();
            });
        }).catch(function(){});
};


