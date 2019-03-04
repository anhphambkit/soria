import Form from '@incResources/form';
import AddressForm from '@componentResources/address-form';
import axios from "axios";
axios.defaults.withCredentials = true;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let addressDefaultForm = new AddressForm();
addressDefaultForm.wrapperProvinceCity = '#province_city_create-default';
addressDefaultForm.wrapperDistrict = '#district_create-default';
addressDefaultForm.wrapperWard = '#ward_create-default';
addressDefaultForm.wrapperMobilePhone = '#mobile_phone_create-default';
addressDefaultForm.apiRefreshDistricts = API_ADDRESS.REFRESH_DISTRICTS;
addressDefaultForm.apiRefreshWards = API_ADDRESS.REFRESH_WARDS;
addressDefaultForm.init();

// Define Form
let newAddressDefaultForm = new Form();
newAddressDefaultForm.wrapper = '#form-create-default-address';
newAddressDefaultForm.url = API_CHECKOUT.CREATE_ADDRESS_SHIPPING;
newAddressDefaultForm.urlCancel = "#";

// Handle event on form
newAddressDefaultForm.handleSubmit();
newAddressDefaultForm.handleCancel();
newAddressDefaultForm.beforeSubmit = () => {
    // Object.assign(newAddressDefaultForm.data, {is_default: true});
    // return newAddressDefaultForm.data;
};

newAddressDefaultForm.afterDone = (data) => {
    refreshListShippingAddress(data.data.data);
    addressDefaultForm.resetDefaultData();
    $("#shipping-address-area").fadeIn();
    $(".new-form-area").fadeOut();
};