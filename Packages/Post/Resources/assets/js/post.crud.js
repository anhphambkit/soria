import StringUtil from '@theme/util/string-util';
import Form from '@theme/inc/form';
import WindowUtil from '@theme/util/window';
import message from '@theme/config/message';
import JSLib from '@theme/inc/js-lib';
import PostImage from './inc/post-image';

let postForm = new Form();
window.postImage = new PostImage();
let postTitleCtrl = $('#post-title');
let postSlugCtrl = $('#post-slug');
let postKeywordsCtrl = $('#post-keywords');

// FORM
postForm.wrapper = '#post-form';
postForm.url = updateMode ? api.post.update : api.post.create;

postForm.beforeSubmit = () => {
    postForm.data.img_id = postImage.thumbImg == null ? null : postImage.thumbImg.id;
    postForm.data.content = tinyMCE.get('post-content').getContent();
};
postForm.afterDone = (data) => {
    let successMess = (new JSLib).format(message.CREATED_SUCCESS, ['Post']);
    if(updateMode){
        successMess = (new JSLib).format(message.UPDATE_SUCCESS, ['Post']);
    } else {
        window.location.href = listUrl;
    }
    toastr.success(successMess);
};

postForm.afterCancel = (data) => {
    window.location.href = listUrl;
};

// Handle event on form
postForm.handleSubmit();
// END FORM

// Register Event
$(document).ready(function(){
    // Register Event Handler for Post Name (Add/Edit)
    postTitleCtrl.on('change', function(){
        // auto generate slug after category name change
        let val = $(this).val();
        if(val.trim().length > 0){
            let stringUtil = new StringUtil();
            postSlugCtrl.val(stringUtil.generateSlug(val));
            postKeywordsCtrl.val(stringUtil.generateSlug(val).replace(/-/g, ' '));

            // Trigger change event
            postSlugCtrl.trigger('change');
            postKeywordsCtrl.trigger('change');
        }
    });

    // update UI when edit mode
    if(updateMode){
        postImage.thumbImg = post.thumbImg;
        postImage.parseTemplate();
    }
});

window.addSingleFile = true;

/**
 * Receive data from Media popup
 * @param mediaId
 * @param orgLink
 * @param mediumLink
 * @param smallLink
 */
window.attachMedia = (mediaId, orgLink, mediumLink = null, smallLink = null) => {
    if(addSingleFile){
        postImage.attachThumbnail(mediaId, orgLink, mediumLink, smallLink);
    } else {
        postImage.attachRelated(mediaId, orgLink, mediumLink, smallLink);
    }
};
window.windowUtil = new WindowUtil();
