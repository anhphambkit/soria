let Handlebars = require('handlebars');

class PostImage{
    constructor(){
        this.thumbPanelCtrl = $('#thumbnail-panel');
        this.thumbImg = null;
        this.isSingle = true;
    }


    attach(mediaId, orgLink, mediumLink = null, smallLink = null){
        this.attachThumbnail(mediaId, orgLink, mediumLink, smallLink);
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
        this.parseTemplate();

    };

    /**
     * Handle remove button
     */
    handleRemoveImage(){
        let postImage = this;
        $('i[data-post-image-control="remove"]').on('click', function(){
            let type = $(this).attr('data-post-image-type');
            postImage.thumbImg = null;
            postImage.parseTemplate();
        });
    };

    /**
     * Parse template
     */
    parseTemplate(){
        var source = $('#thumb-img-template').html();
        var template = Handlebars.compile(source);
        if(this.thumbImg == null){
            this.thumbPanelCtrl.empty();
        } else {
            this.thumbPanelCtrl.html(template(this.thumbImg));
        }
        this.handleRemoveImage();
    }
}

export default PostImage;