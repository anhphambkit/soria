import message from '@/general/js/config/message';
import JSLib from '@/general/js/inc/js-lib';
class responeForm {
    initMessageResponse(data) {
        if (data.status === 0) {
            let successMess = (new JSLib).format(message.CREATED_SUCCESS, ['Product category']);
            swal({
                title: 'Oh Yeah, Success!',
                html: successMess,
                type:"success",
                showCancelButton: false,
                confirmButtonText: 'OK'
            })
                .then(function() {
                    location.reload();
                }).catch(function(){});
        }
    };
    init(data) {
        this.initMessageResponse(data);
    }
}

export default responeForm;