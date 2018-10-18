class toastrAlert {
    initMessageResponse(status, successMessage, errorMessage) {
        if (status === 0) {
            toastr.success(
                successMessage,
                'Oh Yeah!', /* Title */
                { "hideDuration": 3000 }
            )
        }
        else {
            toastr.error(
                errorMessage,
                'Oh No!', /* Title */
                { "hideDuration": 3000 }
            )
        }
    };
    init(status, successMessage, errorMessage) {
        this.initMessageResponse(status, successMessage, errorMessage);
    }
}

export default toastrAlert;