import StringUtil from '@theme/util/string-util';
import Form from '@theme/inc/form';
import message from '@theme/config/message';
import JSLib from '@theme/inc/js-lib';
import BannerImage from './inc/banner-image';
import BannerMultipleImage from './inc/banner-multiple-image';
import WindowUtil from '@theme/util/window';
window.windowUtil = new WindowUtil();

let bannerForm = new Form();

// FORM
bannerForm.wrapper = '#banner-form';
bannerForm.url = updateMode ? api.banner.update : api.banner.create;

bannerForm.beforeSubmit = () => {
    bannerForm.data.sections = bannerMultipleImage.list.map( item => {
        return {
            title: item.title,
            desc: item.desc,
            link: item.link,
            media_id: item.img.id,
        }
    });
    bannerForm.data.img_id = bannerImage.getImages().id;
    bannerForm.data.type = bannerForm.data.type === 'on' ? 'M':'S';
};
bannerForm.afterDone = (data) => {
    let successMess = (new JSLib).format(message.CREATED_SUCCESS, ['banner']);
    if(updateMode){
        successMess = (new JSLib).format(message.UPDATE_SUCCESS, ['banner']);
    }
    toastr.success(successMess);
};

bannerForm.afterCancel = (data) => {
};

// Handle event on form
bannerForm.handleSubmit();
// END FORM

// Handle banner image
window.bannerImage = new BannerImage();
bannerImage.isSingle = true;
bannerImage.template = '#baner-single-image-img-template';
bannerImage.source = '#baner-single-image-source-image-panel';

window.bannerMultipleImage = new BannerMultipleImage();
// Register Event
let bannerTypeEl = '#banner-type';
let sectionMultipleEl = '#multiple-banner';
$(document).ready(function(){
    $(bannerTypeEl).change(function(){
        if(this.checked){
            $(sectionMultipleEl).slideDown();
        } else {
            $(sectionMultipleEl).slideUp();
        }
    });

    $(bannerTypeEl).trigger('change');
});