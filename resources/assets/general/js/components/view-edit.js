import Form from '@incResources/form';
import axios from "axios";
import JSLib from '@helper/util/js-lib';
import message from '@helper/config/messages';
import toastrAlert from '@supportResources/toastr-alert';

class ViewEdit extends Form{
    constructor () {
        super();
        // Set data always disabled
        this.dataAlwaysDisabled = 'always-disabled';
        // Set attribute to get elements btn actions
        this.btnEditActions = '[data-btn-action="edit"]';
        // Set value the next mode
        this.dataIsEditMode = 'next-edit-mode';
        // Set element loading when processing
        this.elementLoading = '.card-view-edit';
        // Set element btn switch mode
        this.switchBtn = '.card-view-edit [data-action="switch-mode"]';
        // Set attribute to get data origin placeholder
        this.attrOrgPlaceholder = 'org-placeholder';
        // Set attribute to get data null placeholder
        this.attrNullPlacholder = 'null-placeholder';
        // Set message when submit success
        this.successMessage = (new JSLib).format(message.CREATED_SUCCESS, ['Item']);
        // Set message when submit fail
        this.errorMessage = message.CONTACT_ADMIN;
    }

    /**
     * Clear data form:
     */
    clearForm() {
        let self = this;
        $(this.wrapper).find('select, input, textarea').each(function(item){
            let nullPlaceholder = $(this).attr(self.attrNullPlacholder) || '-';
            $(this).val(nullPlaceholder);
        });
    }

    /**
     * After switch mode
     */
    afterSwitchMode() {}

    /**
     * Switch mode
     */
    switchMode(isEditMode = false) {
        let self = this;
        if (isEditMode)  {
            $(this.wrapper).find('select, input, textarea').each(function(item){
                let isAlwaysDisabled = $(this).data(self.dataAlwaysDisabled) || false;
                let orgPlaceholder = $(this).attr(self.attrOrgPlaceholder) || '-';
                $(this).attr("placeholder", orgPlaceholder);
                if (isAlwaysDisabled) $(this).attr('disabled','disabled');
                else {
                    $(this).removeAttr('disabled');
                    $(this).parent().removeClass('view-mode-custom');
                }
            });
            $(this.switchBtn).data(self.dataIsEditMode, false);
            $(this.switchBtn).hide();
            $(this.wrapper + ' ' + this.btnEditActions).show();
        }
        else {
            $(this.wrapper).find('select, input, textarea').each(function(item){
                let nullPlaceholder = $(this).attr(self.attrNullPlacholder) || '-';
                $(this).attr("placeholder", nullPlaceholder);
                $(this).attr('disabled','disabled');
                $(this).parent().addClass('view-mode-custom');
            });
            $(this.switchBtn).data(self.dataIsEditMode, true);
            $(this.switchBtn).show();
            $(this.wrapper + ' ' + this.btnEditActions).hide();
        }
        this.afterSwitchMode();
    }

    /**
     * Handle switch btn view/edit
     */
    handleSwitchBtn() {
        this.destroyEvent();
        let self = this;
        $(document).on('click', this.switchBtn, function (e) {
            e.preventDefault();
            let isEditMode = $(self.switchBtn).data(self.dataIsEditMode) || false;
            self.switchMode(isEditMode);
        });
    }

    /**
     * Set element loading
     */
    setloading(){
        return this.elementLoading;
    };

    /**
     * Submit
     */
    submit() {
        this.prepareData();
        this.beforeSubmit();
        $(this.wrapper + ' ' + this.submitBtn).buttonLoader('start');

        this.resetErrors();
        let request = null;

        switch (this.method) {
            case 'POST':
                request = axios.post(this.url, this.data);
                break;
            case 'PATCH':
                request = axios.patch(this.url, this.data);
                break;
            default:
                request = axios.get(this.url, this.data);
        }

        let reuseForm = this;

        // this.loading();
        return request
            .then(function(data){
                reuseForm.done(data.data);
                $(reuseForm.switchBtn).trigger('click');
                let errorMessage = reuseForm.errorMessage || data.data.message;
                let toastrSuccessAlert = new toastrAlert();
                toastrSuccessAlert.init(data.data.status, reuseForm.successMessage, errorMessage)
                reuseForm.afterDone(data.data);
                return data;
            })
            .catch(function(data){
                /**
                 * Do some hook -> parse validation error -> scroll screen to element
                 */
                let dataRespone = data.response;
                reuseForm.fail(dataRespone);
                let errorMessage = reuseForm.errorMessage || data.message;
                let toastrErrorAlert = new toastrAlert();
                toastrErrorAlert.init(dataRespone.status, reuseForm.successMessage, errorMessage)

                reuseForm.fail(data.response.data);
                if(data.response.data != null && data.response.data.status == CONFIG.HTTP_CODE.VALIDATE_ERROR ){
                    reuseForm.parseValidateErrors(data.response.data.data);
                }

                if(data.response.status == 419 || data.response.status == CONFIG.HTTP_CODE.STATUS_EXPIRED_TOKEN)
                    reuseForm.expriedToken(data);

                reuseForm.afterFail(data);
                return data;
            })
            .then(function(data){ // Finally
                if(data.response != undefined){
                    reuseForm.final(data.response.data);
                } else {
                    reuseForm.final(data.data);
                }
                $(reuseForm.wrapper + ' ' + reuseForm.submitBtn).buttonLoader('stop');
            });
    }

    /**
     *  Cancel
     */
    cancel(isRenderView = false) {
        this.beforeCancel();
        if(!this.restoreWhenCancel){
            this.resetErrors();
            this.afterCancel(null);
            this.finalCancel(null);
            return;
        }
        $(this.wrapper + ' ' + this.cancelBtn).buttonLoader('start');
        this.resetErrors();
        let request = null;
        switch (this.methodCancel) {
            case 'POST':
                request = axios.post(this.urlCancel, this.dataCancel);
                break;
            default:
                request = axios.get(this.urlCancel, { params : this.dataCancel });
        }

        // this.loading();
        let reuseForm = this;
        return request
            .then(function(data){
                reuseForm.afterCancel(data.data);
                reuseForm.mapField(data.data.data);
                if (!isRenderView) $(reuseForm.switchBtn).trigger('click');
                return data;
            })
            .catch(function(data){
                /**
                 * Do some hook -> parse validation error -> scroll screen to element
                 */
                reuseForm.failCancel(data.response.data);
                return data;
            })
            .then(function(data){
                if(data.response != undefined){
                    reuseForm.finalCancel(data.response.data);
                } else {
                    reuseForm.finalCancel(data.data);
                }
                $(reuseForm.wrapper + ' ' + reuseForm.cancelBtn).buttonLoader('stop');
            });
    }

    /**
     * Init
     */
    init(isEditMode = false) {
        this.switchMode(isEditMode);
        this.handleSwitchBtn();
        this.handleSubmit();
        this.handleCancel();
    }
}
export default ViewEdit;