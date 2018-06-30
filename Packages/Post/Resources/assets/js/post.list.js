import messageConfig from '@theme/config/message';
import JSLib from '@theme/inc/js-lib';

window.removePost = function(postId, postName){
    swal({
        title: (new JSLib).format(message.deleteTitle, [postName]),
        text: message.deleteContent,
        type:"warning",
        showCancelButton:true,
        confirmButtonClass:"btn btn-confirm mt-2",
        cancelButtonClass:"btn btn-cancel ml-2 mt-2",
        confirmButtonText: message.deleteBtn
    })
    .then(function() {
        axios.delete(api.post.delete, { params: { id: postId }}).then( () => {
            swal("Completed", (new JSLib).format(messageConfig.DELETED_SUCCESS, ['Post']), "success");
            location.reload();
        });
    }).catch(function(){});
};