let Handlebars = require('handlebars');
class ImportImage {
    constructor() {
        this.images = [];
        this.isSingle = true;

        // Template Handlebars will parse HTML to source
        this.template = '#handlebar-template';
        this.source = '#handlebar-source';
    }

    /**
     * Attach media single
     * @param mediaId
     * @param orgLink
     * @param mediumLink
     * @param smallLink
     */
    attach(mediaId, orgLink, mediumLink, smallLink){
        if(this.isSingle){
            this.images = [{
                id: mediaId,
                link: orgLink
            }];
        } else {
            this.images.push({
                id: mediaId,
                link: orgLink
            });
        }

        this.parseTemplate();
    };

    /**
     * Get images
     * @returns Array | null: if this is single image will return the first image in images[] or null if empty. if this is multiple it will return list images
     */
    getImages(){
        if(this.isSingle && this.images!= null && this.images.length > 0){
            return this.images[0];
        }
        else if (this.isSingle && (this.images!= null && this.images.length > 0)){
            return null;
        }

        return this.images;
    }

    /**
     * Parse HTML from this.template to this.source
     */
    parseTemplate(){
        var source = $(this.template).html();
        var template = Handlebars.compile(source);
        $(this.source).html(template(this.images));
        this.handleRemoveImage();
    }

    /**
     * Handle remove button
     */
    handleRemoveImage(){
        let ctrlImage = this;
        $('.component-images i[data-image-control="remove"]').on('click', function(){
            let isSingle = $(this).attr('data-image-single');
            if(isSingle === 'true'){
                ctrlImage.images = [];
            } else {
                let index = parseInt($(this).attr('data-image-index'));
                ctrlImage.images.splice(index, 1);
            }
            ctrlImage.parseTemplate();
        });
    };
}

export default ImportImage;