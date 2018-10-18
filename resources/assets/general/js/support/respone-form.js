class responeForm {
    initMessageResponse(status, successMessage, errorMessage) {
        if (status === 0) {
            swal({
                title: 'Oh Yeah, Success!',
                html: successMessage,
                type:"success",
                showCancelButton: false,
                confirmButtonText: 'OK'
            }).then(() => {
                location.reload();
            }).catch(function(){});
        }
        else {
            swal({
                title: 'Oh No, Error!',
                html: errorMessage,
                type:"error",
                showCancelButton: false,
                confirmButtonText: 'Close'
            }).catch(function(){});
        }
    };
    init(status, successMessage, errorMessage = null) {
        this.initMessageResponse(status, successMessage, errorMessage);
    }
}

export default responeForm;