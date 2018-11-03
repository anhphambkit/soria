class responeForm {
    initMessageResponse(status, successMessage, errorMessage) {
        if (status === 0) {
            swal({
                title: 'Oh Yeah, Success!',
                icon: "success",
                text: successMessage,
                confirm: {
                    text: "OK",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: true
                }
            }).then((confirm) => {
            }).catch(function(){});
        }
        else {
            swal({
                title: 'Oh No, Error!',
                text: errorMessage,
                icon: "error",
                confirm: {
                    text: "Close",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: true
                }
            }).catch(function(){});
        }
    };
    init(status, successMessage, errorMessage = null) {
        this.initMessageResponse(status, successMessage, errorMessage);
    }
}

export default responeForm;