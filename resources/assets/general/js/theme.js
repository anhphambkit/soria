import floatLabel from './inc/float-label';
import panel from './inc/panel';
import jQueryPrototype from './inc/jquery-prototype';
import axios from 'axios';
import JSLib from './inc/js-lib';
import message from './config/message';

window.clearCache = function(e) { // Request to server to clear cache
    axios.post(sysApi.cache.clear)
        .then( function() {
            let successMess = (new JSLib).format(message.DELETED_SUCCESS, ['Cache']);
            toastr.success(successMess);
        })
        .catch( function() {

        });
    return false;
};

$(document).ready( function() {
    jQuery = jQueryPrototype;
    floatLabel.init();

    $('.card-box .control-panel .switch-panel-mode').each(function(index, control){
        panel.handleEditButton(control);
        $(control).trigger('click');
    });

    // Auto detect class "select2-control" and bind Select2 plugin for it
    if($.fn.select2){
        $('.select2-control').select2();
    }
    // Auto detect class "date-picker" to init datepicker bootstrap
    if($.fn.datepicker){
        $('input.date-picker').datepicker();
    }
    if(typeof tinymce !== 'undefined'){
        tinymce.init({ selector:'textarea.eden-editor' });
    }
});
