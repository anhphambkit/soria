class ImagePreviewUpload {
    constructor(){
        // U must define correct wrapper whenever use this
        this.wrapper = '.img-preview-upload-wrapper';
        // Define element preview img
        this.elementPreviewImage = this.wrapper + ' .preview-img-custom';
        // Define default img
        this.defaultImg = '/default-avatar-user.png';
        // Define element input file
        this.elementInputFile = this.wrapper + ' .input-file-upload-custom';
    }

    /**
     *  Handle event on change input file
     */
    init() {
        let self = this;
        $(document).on('change', $(this.elementInputFile), function () {
            console.log(self.defaultImg);
            self.readImage();
        });
    }

    /**
     * Read image and parse to preview
     */
    readImage() {
        let self = this;
        if ($(this.elementInputFile).files && $(this.elementInputFile).files[0]) {
            var reader = new FileReader();
            reader.onload = function (evt) {
                $(self.elementPreviewImage)
                    .attr('src', evt.target.result);
            };

            reader.readAsDataURL($(this.elementInputFile).files[0]);
        }
        else $(this.elementPreviewImage).attr('src', self.defaultImg);
    }
}
export default ImagePreviewUpload;

window.readURL = function (input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview-logo')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
    else {
        $('#preview-logo').attr('src', '/default-avatar-user.png');
        $('#preview-logo').hide();
    }
}