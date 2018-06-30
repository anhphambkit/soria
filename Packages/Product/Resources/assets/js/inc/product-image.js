let Handlebars = require('handlebars');

class ProductImage{
    constructor(){
        this.thumbPanelCtrl = $('#thumbnail-panel');
        this.relatedPanelCtrl = $('#related-panel');
        this.thumbImg = null;
        this.isSingle = true;
        /**
         * [ { id: 12, link: 'abc.jpg' } ]
         * @type {Array}
         */
        this.relatedImg = [];
    }


    attach(mediaId, orgLink, mediumLink = null, smallLink = null){
        if (this.isSingle){
            this.attachThumbnail(mediaId, orgLink, mediumLink, smallLink);
        } else {
            this.attachRelated(mediaId, orgLink, mediumLink, smallLink);
        }
    }

    /**
     * Add thumbnail image
     * @param mediaId
     * @param orgLink
     * @param mediumLink
     * @param smallLink
     */
    attachThumbnail(mediaId, orgLink, mediumLink = null, smallLink = null){
        this.thumbImg = { id: mediaId, link: orgLink };
        this.parseTemplate(false);

    };

    /**
     * Add related images
     * @param mediaId
     * @param orgLink
     * @param mediumLink
     * @param smallLink
     */
    attachRelated(mediaId, orgLink, mediumLink = null, smallLink = null){
        this.relatedImg.push({ id: mediaId, link: orgLink });
        this.parseTemplate(true);
    };

    /**
     * Handle remove button
     */
    handleRemoveImage(){
        let productImage = this;
        $('i[data-product-image-control="remove"]').on('click', function(){
            let type = $(this).attr('data-product-image-type');
            if(type === 'thumb'){
                productImage.thumbImg = null;
                productImage.parseTemplate(false);
            } else {
                let index = parseInt($(this).attr('data-product-image-index'));
                productImage.relatedImg.splice(index, 1);
                productImage.parseTemplate(true);
            }
        });
    };

    /**
     * Parse template
     * @param relatedTemplate
     */
    parseTemplate(relatedTemplate = true){
        var source = $('#thumb-img-template').html();
        if(relatedTemplate){
            source = $('#related-img-template').html();
        }
        var template = Handlebars.compile(source);

        if(relatedTemplate){
            this.relatedPanelCtrl.html(template(this.relatedImg));
        } else {
            if(this.thumbImg == null){
                this.thumbPanelCtrl.empty();
            } else {
                this.thumbPanelCtrl.html(template(this.thumbImg));
            }
        }
        this.handleRemoveImage();
    }
}

export default ProductImage;