import messageConfig from '@theme/config/message';
import JSLib from '@theme/inc/js-lib';

window.removeBanner = function(id, name){
    swal({
        title: (new JSLib).format(message.deleteTitle, [name]),
        text: message.deleteContent,
        type:"warning",
        showCancelButton:true,
        confirmButtonClass:"btn btn-confirm mt-2",
        cancelButtonClass:"btn btn-cancel ml-2 mt-2",
        confirmButtonText: message.deleteBtn
    })
        .then(function() {
            axios.delete(api.banner.delete, { params: { id: id }}).then( () => {
                swal("Completed", (new JSLib).format(messageConfig.DELETED_SUCCESS, ['Banner']), "success");
                location.reload();
            });
        }).catch(function(){});
};