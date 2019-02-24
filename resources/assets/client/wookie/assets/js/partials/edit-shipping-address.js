import Form from '@incResources/form';
import AddressForm from '@componentResources/address-form';
import axios from "axios";
axios.defaults.withCredentials = true;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let addressEditRegister = new AddressForm();
addressEditRegister.wrapperProvinceCity = '#province_city_update';
addressEditRegister.wrapperDistrict = '#district_update';
addressEditRegister.wrapperWard = '#ward_update';
addressEditRegister.wrapperMobilePhone = '#mobile_phone_update';
addressEditRegister.apiRefreshDistricts = API_ADDRESS.REFRESH_DISTRICTS;
addressEditRegister.apiRefreshWards = API_ADDRESS.REFRESH_WARDS;
addressEditRegister.init();

// Define Form
let editAddressForm = new Form();
editAddressForm.wrapper = '#form-update-address';
editAddressForm.url = API_CHECKOUT.UPDATE_ADDRESS_SHIPPING;
editAddressForm.urlCancel = "#";

// Handle event on form
editAddressForm.cancel = () => {
    editAddressForm.resetErrors();
    editAddressForm.clearForm();
    addressEditRegister.resetDefaultData();
    $("#shipping-address-area").fadeOut();
    $(".edit-form-area").fadeIn();
};

// Handle event on form
editAddressForm.handleSubmit();
editAddressForm.handleCancel();
editAddressForm.beforeSubmit = () => {
    // Object.assign(editAddressForm.data, {is_default: true});
    // return editAddressForm.data;
};

editAddressForm.afterDone = (data) => {
    refreshListShippingAddress(data.data.data);
    addressEditRegister.resetDefaultData();
    $("#shipping-address-area").fadeOut();
    $(".edit-form-area").fadeIn();
};