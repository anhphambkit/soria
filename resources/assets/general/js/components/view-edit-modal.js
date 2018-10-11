import ViewEdit from '@componentResources/view-edit';
import axios from "axios";

class ViewEditModal extends ViewEdit{
    constructor () {
        super();
        // U must define correct wrapper whenever use this | wrapper search filter
        this.wrapperModal = '.modal-custom';
        // Set element btn switch mode
        this.switchBtn = '.modal-edit-custom [data-action="switch-mode"]';
        // Set default type modal
        this.hasViewEditMode = false;
        this.elementLoading = this.wrapperModal + ' .modal-body';
    }

    /**
     * Set element loading
     */
    setloading(){
        return this.elementLoading;
    };

    /**
     * Reset data for search table
     */
    resetDataForm() {
        $(this.wrapper)[0].reset();
    }

    /**
     * Auto handle event click on Cancel
     */
    handleCancel(){
        let self = this;
        $(this.wrapper + ' ' + this.cancelBtn).on('click', function(e) {
            e.preventDefault();
            self.cancelModal();
        });
    }

    cancelModal() {
        if (this.hasViewEditMode) {
            this.cancel();
        }
        else {
            this.beforeCancel();
            this.resetErrors();
            $(this.wrapperModal).modal('hide');
        }
    }

    destroyEvent() {
        $(this.wrapper + ' ' + this.submitBtn).off('click');
        $(this.wrapper + ' ' + this.cancelBtn).off('click');
        $(this.switchBtn).unbind('click');
        $(this.switchBtn).off('click');
    }

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

        this.loading();
        return request
            .then(function(data){
                reuseForm.done(data.data);
                new Noty({
                    text: reuseForm.successMessage,
                    type   : 'success',
                    theme  : 'mint',
                    layout : 'topRight',
                    timeout: 3000
                }).show();
                $(reuseForm.switchBtn).trigger('click');
                reuseForm.afterDone(data.data);

                if (!reuseForm.hasViewEditMode) reuseForm.resetDataForm();
                $(reuseForm.wrapperModal).modal('hide');
                return data;
            })
            .catch(function(data){
                /**
                 * Do some hook -> parse validation error -> scroll screen to element
                 */
                // new Noty({
                //     text: reuseForm.failMessage,
                //     type   : 'error',
                //     theme  : 'mint',
                //     layout : 'topRight',
                //     timeout: 3000
                // }).show();
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
     * Init
     */
    init(isEditMode = false, isLoadData = false) {
        if (this.hasViewEditMode) {
            if (isLoadData) this.cancel(isLoadData);
            this.switchMode(isEditMode);
            this.handleSwitchBtn();
            this.handleSubmit();
            this.handleCancel();
        }
        else {
            this.handleSubmit();
            this.handleCancel();
        }
    }
}
export default ViewEditModal;