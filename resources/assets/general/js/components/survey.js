import axios from "axios";
import JSLib from '@helper/util/js-lib';
import message from '@helper/config/messages';

class Survey {
    constructor(){
        // Define wrapper form survey:
        this.wrapper = '.survey-form';
        // Define URL send result of survey to server:
        this.urlSurvey = '#';
        // Define method of url:
        this.methodUrlSurvey = 'POST';
        // Data to send
        this.data = {};
        // Define item survey element:
        this.surveyItem = '.survey-item';
        // Define data section of survey:
        this.dataSectionSurvey = 'section-survey';
        // Define data except section of survey:
        this.dataExceptSectionSurvey = 'except-section';
        // Define data to determine that question apply for all section of survey:
        this.allSectionSurvey = 'section-all';
        // Define data to determine that prepare input of that section:
        this.dataApplySectionSurvey = 'apply-section-survey';
        // Define class disabled for disabled btn next survey:
        this.disabledClass = 'disabled';
        // Define btn next survey (common class):
        this.btnNextSurvey = '.btn-next-survey';
        // Define prefix btn next survey:
        this.prefixBtnNext = '.btn-next-';
        // Define prefix validation element:
        this.prefixValidationElement = '.validation-survey-';
        // Define Data to get Index Survey (Unique):
        this.dataIndexSurvey = 'survey';
        // Define data to get order/current step of survey:
        this.stepSurvey = 'step-survey';
        // Define class to set survey active:
        this.activeSurvey = 'active';
        // Define data survey question to get current question element | It's question to get value and then go to next survey follow answer
        this.conditionQuestionSurvey = 'condition-question-survey';
        // Define value when check Yes/No:
        this.trueValue = 'yes';
        this.falseValue = 'no';
        // Define data index true value to know the index survey will be next when user answer true:
        this.trueIndex = 'index-true';
        // Define data index false value to know the index survey will be next when user answer false:
        this.falseIndex = 'index-false';
        // Define data back index to know the index survey will be prev:
        this.backIndex = 'index-back';
        // Define data current index to know the current index of survey:
        this.currentIndex = 'index-current';
        // Define data index next question to know the next step of survey:
        this.nextIndex = 'index-next';
        // Define icon complete survey element:
        this.iconCompleteSurvey = '.check-mark-icon';
        // Define animations:
        this.fadeOutLeft = 'fadeOutLeft animated fast';
        this.fadeOutRight = 'fadeOutRight animated fast';
        this.fadeInLeft = 'fadeInLeft animated fast';
        this.fadeInRight = 'fadeInRight animated fast';
        this.animationTime = 300;
        // Define progress element:
        this.progressEl	= $('#survey-progress .determinate');
        // Define Item Complete Survey
        this.itemComplete = $('.survey-item.complete');
        // Define total item survey:
        this.totalItem = $('.survey-item:not(.complete)').length;
        // Define progress width
        this.progressWidth	= 100 / this.totalItem;
        // Define title total element
        this.titleElement = $('#survey-title-total');
        // Define title text survey progress:
        this.titleTextProgressSurvey = 'Question ';
        // Define data handle go to custom survey:
        this.dataHandleGoToCustom = '[go-to-custom-survey]';
        // Define data handle go to custom survey with conditions true/false of answer:
        this.dataHandleGoToWithConditions = '[go-to-with-conditions]';
        // Define data handle go back custom survey with conditions true/false of answer:
        this.dataHandleGoBackWithConditions = '[go-back-with-conditions]';
        // Define data handle go to next survey:
        this.dataHandleGoToNextSurvey = '[go-to-next-survey]';
        // Define data handle go to prev survey:
        this.dataHandleGoToPrevSurvey = '[go-to-prev-survey]';
        // Define data handle go to prev survey:
        this.dataHandleGoToCompleteSurvey = '[go-to-complete-survey]';
    }

    /* Set Progress Bar */
    getStatusProgress(){
        let data = $(this.surveyItem + '.' + this.activeSurvey).data(this.stepSurvey);
        this.titleElement.text(this.titleTextProgressSurvey + data + '/' + this.totalItem);
        this.progressEl.css('width', ((data-1) * this.progressWidth) + '%');
    }

    /* Go to Next Element */
    goToNext(current, index){
        let next = current.next();

        next.length != 1 ? index = 0 : index = index+1;

        if(index == 0) return;

        // Current Fade Out
        current.addClass(this.fadeOutLeft);

        // Next Fade In
        setTimeout(function(){
            next.addClass(this.fadeInRight + ' ' + this.activeSurvey);
            current.removeClass(this.fadeOutLeft + ' ' + this.activeSurvey);
            // Get Status
            this.getStatusProgress();
        }, this.animationTime);

        setTimeout(function(){
            next.removeClass(this.fadeInRight);
        }, this.animationTime * 3);
    }

    /* Go to Previous Element */
    goToPrev(current, index){
        let prev = current.prev();

        prev.length != 1 ? index = 0 : index = index-1;

        if(index == 0) return;

        // Current Fade Out
        current.addClass(this.fadeOutRight);

        // Prev Fade In
        setTimeout(function(){
            prev.addClass(this.fadeInLeft + ' ' + this.activeSurvey);
            current.removeClass(this.fadeOutRight + ' ' + this.activeSurvey);
            // Get Status
            this.getStatusProgress();
        }, this.animationTime);

        setTimeout(function(){
            prev.removeClass(this.fadeInLeft);
        }, this.animationTime * 3);
    }

    /* Go to Index Element */
    goToIndex(index){
        let self = this;
        let current = $('[data-' + this.dataIndexSurvey + '="'+index+'"]');

        if(current.length == 0) return;

        $('[data-survey]').removeClass(this.fadeOutLeft + ' ' + this.fadeOutRight + ' ' + this.fadeInLeft + ' ' + this.fadeInRight + ' ' + this.activeSurvey);
        current.addClass(this.fadeInRight + ' ' + this.activeSurvey);

        setTimeout(function(){
            current.removeClass(self.fadeInRight);
            self.getStatusProgress();
        }, self.animationTime);
    }

    /* Go To Index Element By Conditions */
    goToIndexByConditions(currentIndex, indexTrue, indexFalse) {
        let val = $(this.surveyItem + '[data-' + this.dataIndexSurvey + '="' + currentIndex + '"] input[' + this.conditionQuestionSurvey + ']:checked').val();
        if (val === this.trueValue) {
            this.goToIndex(indexTrue);
        }
        else {
            this.goToIndex(indexFalse);
        }
    }

    /* Handle event go to custom survey */
    goToCustomHandle() {
        let self = this;
        $(this.dataHandleGoToCustom).on('click', function () {
            let currentSurvey = $(this).closest(self.surveyItem).data(self.dataIndexSurvey);
            if ($(this).hasClass(self.disabledClass)) {
                $(self.prefixValidationElement + currentSurvey).text(message.SURVEY_VALIDATION);
            } else {
                let indexNextQuestion = $(this).data(self.nextIndex);
                self.goToIndex(indexNextQuestion);
            }
        });
    }

    /* Handle event go to custom survey with conditions true/false of answer */
    goToWithConditionHandle() {
        let self = this;
        $(this.dataHandleGoToWithConditions).on('click', function () {
            let currentSurvey = $(this).closest(self.surveyItem).data(self.dataIndexSurvey);
            if ($(this).hasClass(self.disabledClass)) {
                $(self.prefixValidationElement + currentSurvey).text(message.SURVEY_VALIDATION);
            } else {
                let currentIndex = $(this).data(self.currentIndex);
                let trueIndex = $(this).data(self.trueIndex);
                let falseIndex = $(this).data(self.falseIndex);
                self.goToIndexByConditions(currentIndex, trueIndex, falseIndex);
            }
        });
    }

    /* Handle event go back custom survey with conditions true/false of answer */
    goBackWithConditionHandle() {
        let self = this;
        $(this.dataHandleGoBackWithConditions).on('click', function () {
            let currentSurvey = $(this).closest(self.surveyItem).data(self.dataIndexSurvey);
            if ($(this).hasClass(self.disabledClass)) {
                $(self.prefixValidationElement + currentSurvey).text(message.SURVEY_VALIDATION);
            } else {
                let backIndex = $(this).data(self.backIndex);
                self.goToIndex(backIndex);
            }
        })
    }

    /* Handle event go to next survey */
    goToNextSurveyHandle() {
        let self = this;
        $(this.dataHandleGoToNextSurvey).on('click', function(){
            let currentSurvey = $(this).closest(self.surveyItem).data(self.dataIndexSurvey);
            if ($(this).hasClass(self.disabledClass)) {
                $(self.prefixValidationElement + currentSurvey).text(message.SURVEY_VALIDATION);
            } else {
                let item = $(this).closest(self.surveyItem),
                    data = item.data(self.dataIndexSurvey);
                self.goToNext(item, data);
            }
        });
    }

    /* Handle event go to prev survey */
    goToPrevSurveyHandle() {
        let self = this;
        $(this.dataHandleGoToPrevSurvey).on('click', function(){
            let currentSurvey = $(this).closest(self.surveyItem).data(self.dataIndexSurvey);
            if ($(this).hasClass(self.disabledClass)) {
                $(self.prefixValidationElement + currentSurvey).text(message.SURVEY_VALIDATION);
            } else {
                let item = $(this).closest(self.surveyItem),
                    data = item.data(self.dataIndexSurvey);
                self.goToPrev(item, data);
            }
        });
    }

    /* Handle event go to complete survey */
    goToCompleteSurveyHandle() {
        let self = this;
        $(this.dataHandleGoToCompleteSurvey).on('click', function(){
            let currentSurvey = $(this).closest(self.surveyItem).data(self.dataIndexSurvey);
            if ($(this).hasClass(self.disabledClass)) {
                $(self.prefixValidationElement + currentSurvey).text(message.SURVEY_VALIDATION);
            } else {
                self.submitSurvey($(this));
            }
        });
    }

    /* Loading Layout/Element */
    loading()
    {
        elementLoading = this.wrapper;
    }

    /* Hook Before Submit */
    beforeSubmit(){};
    done(data){};
    afterDone(data){};
    fail(data){};
    afterFail(data){};
    final(data){};
    expriedToken(data){};

    /* _this: current element was click submitted */
    submitSurvey(_this) {
        let indexSection = _this.data(this.dataApplySectionSurvey);
        this.prepareData(indexSection);
        this.beforeSubmit();
        $(_this).buttonLoader('start');

        let request = null;
        switch (this.methodUrlSurvey) {
            case 'POST':
                request = axios.post(this.urlSurvey, this.data);
                break;
            case 'PATCH':
                request = axios.patch(this.urlSurvey, this.data);
                break;
            default:
                request = axios.get(this.urlSurvey, this.data);
        }

        let self = this;

        this.loading();
        return request
            .then(function(data){
                self.done(data.data);
                /* Animation when post survey success */
                let itemSurvey = _this.closest(self.surveyItem),
                    icon = self.itemComplete.find(self.iconCompleteSurvey);

                // Current Fade Out
                itemSurvey.addClass(self.fadeOutLeft);

                // Next Fade In
                setTimeout(function(){
                    self.itemComplete.addClass(self.fadeInRight + ' ' + self.activeSurvey);
                    itemSurvey.removeClass(self.fadeOutLeft + ' ' + self.activeSurvey);

                    //  Get Status
                    self.progressEl.css('width', '100%');
                }, self.animationTime);

                setTimeout(function(){
                    self.itemComplete.removeClass(self.fadeInRight);
                }, self.animationTime * 3);

                setTimeout(function(){
                    icon.addClass('animation');
                }, self.animationTime * 3.1);

                self.afterDone(data.data);
                return data;
            })
            .catch(function(data){
                /**
                 * Do some hook -> parse validation error -> scroll screen to element
                 */
                $(self.wrapper + ' ' + self.submitBtn).buttonLoader('stop');
                self.fail(data.response.data);
                if(data.response.data != null && data.response.data.status == CONFIG.HTTP_CODE.VALIDATE_ERROR ){
                    self.parseValidateErrors(data.response.data.data);
                }

                if(data.response.status == 419 || data.response.status == CONFIG.HTTP_CODE.STATUS_EXPIRED_TOKEN)
                    self.expriedToken(data);

                self.afterFail(data);
                return data;
            })
            .then(function(data){ // Finally
                if(data.response != undefined){
                    self.final(data.response.data);
                } else {
                    self.final(data.data);
                }
                $(self.wrapper + ' ' + self.submitBtn).buttonLoader('stop');
            });
    }

    /**
     * Prepare data from Form => Json. Send it to server
     */
    prepareData(indexSection = null){
        let self = this;
        let inputs = $(this.wrapper + " :input")
            .not('button');
        $(inputs).each(function() {
            let $this = $(this);
            let dataInput = {};
            if (indexSection === null) {
                dataInput = self.parseJsonValueInput($this);
            }
            else {
                let exceptSections = $this.closest(self.surveyItem).data(self.dataExceptSectionSurvey) || "";
                let surveySections = $this.closest(self.surveyItem).data(self.dataSectionSurvey) || "";
                let sectionAll = $this.closest(self.surveyItem).attr(self.allSectionSurvey);
                let isExcept = self.checkInString(indexSection, exceptSections);
                let isApplySection = self.checkInString(indexSection, surveySections);
                if (typeof sectionAll !== typeof undefined || (exceptSections !== '' && !isExcept))  {
                    dataInput = self.parseJsonValueInput($this);
                }
                else if (isApplySection) {
                    dataInput = self.parseJsonValueInput($this);
                }
            }
            Object.assign(self.data, dataInput);
        });
        return this.data;
    }

    /**
     * Check char in a string with char separated
     */
    checkInString(char, str, separated = ",") {
        let arrayString = str.toString().split(separated);
        let index = arrayString.indexOf(char.toString());
        if (index !== -1) return true;
        else return false;
    }

    /**
     * Parse value from input by json object
     */
    parseJsonValueInput($this) {
        let newData = {};
        if ($this.is("input")) {
            // <input> element.
            let typeInput = $this.attr('type');
            switch (typeInput) {
                case 'radio':
                case 'checkbox':
                    let nameInput = $this.attr('name');
                    let value = $(this.wrapper + " input[name='" + nameInput + "']:checked").val();
                    newData[nameInput] = value;
                    break;
                default:
                    newData[$this.attr('name')] = $this.val();
                    break;
            }
        } else if ($this.is("select")) {
            // <select> element.
            newData[$this.attr('name')] = $this.val();
        } else if ($this.is("textarea")) {
            // <textarea> element.
            newData[$this.attr('name')] = $this.val();
        }
        return newData;
    }

    /* On all events */
    handleAllEvents() {
        this.goToCustomHandle();
        this.goToWithConditionHandle();
        this.goBackWithConditionHandle();
        this.goToNextSurveyHandle();
        this.goToPrevSurveyHandle();
        this.goToCompleteSurveyHandle();
    }

    /* Hook register more validate */
    registerMoreValidate() {}

    /* Enable btn next survey */
    enableBtnNextSurvey(currentSurvey) {
        $(this.prefixBtnNext + currentSurvey).removeAttr('disabled');
    }

    /* Disable btn next survey */
    disableBtnNextSurvey(currentSurvey) {
        $(this.prefixBtnNext + currentSurvey).attr('disabled', 'disabled');
    }

    /* Disabled all btn when init */
    disableAllBtnNext() {
        $('.btn-next-survey').attr('disabled', 'disabled');
    }

    /* Add Disabled Class to all btn when init */
    addDisabledClassAllBtnNext() {
        $(this.btnNextSurvey).addClass(this.disabledClass);
    }

    /* Require must answer question to next survey */
    validateAnswerBeforeNextSurvey() {
        let self = this;
        this.disableAllBtnNext();
        $(function(){
            $('input[type="radio"]').click(function(){
                if ($(this).is(':checked'))
                {
                    let currentSurvey = $(this).closest(self.surveyItem).data(self.dataIndexSurvey);
                    self.enableBtnNextSurvey(currentSurvey);
                }
            });
            $('input[type="text"], textarea').on('change, keyup', function(){
                let val = $(this).val();
                let currentSurvey = $(this).closest(self.surveyItem).data(self.dataIndexSurvey);
                if (val !== undefined && val !== '') {
                    self.enableBtnNextSurvey(currentSurvey);
                }
                else {
                    self.disableBtnNextSurvey(currentSurvey);
                }
            });
            self.registerMoreValidate();
        });
    }

    /* Require must answer question to next survey */
    validateAnswerSurveyInlineErrorStyle() {
        let self = this;
        this.addDisabledClassAllBtnNext();
        $(function(){
            $('input[type="radio"]').click(function(){
                if ($(this).is(':checked'))
                {
                    let currentSurvey = $(this).closest(self.surveyItem).data(self.dataIndexSurvey);
                    self.disableValidateInline(currentSurvey);
                }
            });
            $('input[type="text"], textarea').on('change, keyup', function(){
                let val = $(this).val();
                let currentSurvey = $(this).closest(self.surveyItem).data(self.dataIndexSurvey);
                if (val !== undefined && val !== '') {
                    self.disableValidateInline(currentSurvey);
                }
                else {
                    self.enableValidateInline(currentSurvey);
                }
            });
            self.registerMoreValidate();
        });
    }

    disableValidateInline(currentSurvey) {
        $(this.prefixBtnNext + currentSurvey).removeClass(this.disabledClass);
        $(this.prefixValidationElement + currentSurvey).text('');
    }

    enableValidateInline(currentSurvey) {
        $(this.prefixBtnNext + currentSurvey).addClass(this.disabledClass);
        $(this.prefixValidationElement + currentSurvey).text(message.SURVEY_VALIDATION);
    }

    /* Hook before init */
    beforeInit() {};

    /* Hook after init */
    afterInit() {};

    init(inlineValidateStyle = false) {
        this.beforeInit();
        this.getStatusProgress();
        this.handleAllEvents();
        if (!inlineValidateStyle) this.validateAnswerBeforeNextSurvey();
        else this.validateAnswerSurveyInlineErrorStyle();
        this.afterInit();
    }

}
export default Survey;