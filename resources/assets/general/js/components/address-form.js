import axios from 'axios';
axios.defaults.withCredentials = true;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

class AddressForm {
    constructor(){
        // U must define correct wrapper whenever use this
        this.wrapperProvinceCity = '#province_city';
        this.wrapperDistrict = '#district';
        this.wrapperWard = '#ward';
        this.dataDistrict = [];
        this.dataWard = [];
        this.apiRefreshDistricts = "#";
        this.apiRefreshWards = "#";
    }

    /*
       Hooks
     */
    loadingElement(element = this.wrapperTable) {
        elementLoading = element;
    }

    handleDistrictData() {
        let addressForm = this;
        $(this.wrapperProvinceCity).on('change', function(e) {
            e.preventDefault();
            let data = {
                "province_city_code" : $(this).val()
            };
            addressForm.requestGetNewData(addressForm.wrapperDistrict, addressForm.apiRefreshDistricts, data);
        });
    }

    handleWardData() {
        let addressForm = this;
        $(this.wrapperDistrict).on('change', function(e) {
            e.preventDefault();
            let data = {
                "district_code" : $(this).val()
            };
            addressForm.requestGetNewData(addressForm.wrapperWard, addressForm.apiRefreshWards, data);
        });
    }

    requestGetNewData(element, api, data) {
        let request = axios.get(api, { params: data});

        return request
        .then(function(data){
            $(element).select2({
                width: '100%',
                placeholder: "Select a pill",
                data: data.data.data
            });
            return data;
        })
        .catch(function(data){
            console.log("error", data);
        })
        .then(function(data){

        });
    }

    ajaxUpdateDistrictData() {
        this.dataDistrict = [
            {
                id: 0,
                text: 'enhancement'
            },
            {
                id: 1,
                text: 'bug'
            },
            {
                id: 2,
                text: 'duplicate'
            },
            {
                id: 3,
                text: 'invalid'
            },
            {
                id: 4,
                text: 'wontfix'
            }
        ];
        let addressForm = this;

        $(this.wrapperDistrict).select2({
            width: '100%',
            placeholder: "Select a pill",
            data: addressForm.dataDistrict
        })
        // $(addressForm.wrapperDistrict).val(null).trigger('change');
    }

    ajaxUpdateWardData() {
        this.dataWard = [
            {
                id: 0,
                text: 'enhancement'
            },
            {
                id: 1,
                text: 'bug'
            },
            {
                id: 2,
                text: 'duplicate'
            },
            {
                id: 3,
                text: 'invalid'
            },
            {
                id: 4,
                text: 'wontfix'
            }
        ];
        let addressForm = this;

        $(this.wrapperWard).select2({
            width: '100%',
            placeholder: "Select a pill",
            data: addressForm.dataWard
        })
        // $(addressForm.wrapperWard).val(null).trigger('change');
    }

    /**
     *  Init function:
     */
    init() {
        let defaults = {
            width: '100%',
            placeholder: "Select a province/city",
        }
        let addressForm = this;
        $(document).ready(function() {
            let config = Object.assign(defaults);
            $(addressForm.wrapperProvinceCity).select2(config);
            // $(addressForm.wrapperProvinceCity).val(null).trigger('change');
        });

        this.handleDistrictData();
        this.handleWardData();
    }
}
export default AddressForm;