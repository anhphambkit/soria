import axios from "axios";
import JSLib from '@helper/util/js-lib';
import message from '@helper/config/messages';
import StringComponent from '@helper/util/string-util'

class Slug extends StringComponent{
    constructor () {
        super();
        // U must define correct wrapper whenever use this
        this.wrapper = '[data-type="slug"]';
        // Data generate auto from input:
        this.fromInput = '[data-type="source-slug"]';
        // Attach token when submit
        this.token = '';
        // method to submit POST / GET / PUT / DELETE ...
        this.method = 'POST';
        // Url to send submit
        this.url = '//google.com';
        // Data to send
        this.data = {};
        // Set attribute to get data origin placeholder
        this.attrOrgPlaceholder = 'org-placeholder';
        // Set attribute to get data null placeholder
        this.attrNullPlacholder = 'null-placeholder';
        // Set message when submit success
        this.successMessage = (new JSLib).format(message.CREATED_SUCCESS, ['Item']);
        // Set message when submit fail
        this.failMessage = message.CONTACT_ADMIN;
    }

    /**
     * Auto handle event Change on Input Source Slug
     */
    handleSourceData(){
        let self = this;
        $(this.fromInput).on('change keyup', function(e) {
            e.preventDefault();
            let slugData = self.generateSlug($(this).val());
            // Replace new to slug:
            $(self.wrapper).val(slugData)
        });
    }

    /**
     * Auto handle event Change on Input Slug
     */
    handleSlugData(){
        let self = this;
        $(this.wrapper).on('keyup', function(e) {
            e.preventDefault();
            let slugData = self.generateSlug($(this).val());
            // Replace new to slug:
            $(self.wrapper).val(slugData)
        });
    }

    /**
     * Init
     */
    init() {
        this.handleSourceData();
        this.handleSlugData();
    }
}
export default Slug;