import Form from '@incResources/form';
import AddressForm from '@componentResources/address-form';
import axios from "axios";
axios.defaults.withCredentials = true;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let addressNewRegister = new AddressForm();
addressNewRegister.wrapperProvinceCity = '#province_city_create';
addressNewRegister.wrapperDistrict = '#district_create';
addressNewRegister.wrapperWard = '#ward_create';
addressNewRegister.wrapperMobilePhone = '#mobile_phone_create';
addressNewRegister.apiRefreshDistricts = API_ADDRESS.REFRESH_DISTRICTS;
addressNewRegister.apiRefreshWards = API_ADDRESS.REFRESH_WARDS;
addressNewRegister.init();

// Define Form
let newAddressForm = new Form();
newAddressForm.wrapper = '#form-create-address';
newAddressForm.url = API_CHECKOUT.CREATE_ADDRESS_SHIPPING;
newAddressForm.urlCancel = "#";

// Handle event on form
newAddressForm.cancel = () => {
    newAddressForm.resetErrors();
    newAddressForm.clearForm();
    addressNewRegister.resetDefaultData();
    $("#shipping-address-area").fadeIn();
    $(".new-form-area").fadeOut();
};
newAddressForm.handleSubmit();
newAddressForm.handleCancel();
newAddressForm.beforeSubmit = () => {
    // Object.assign(newAddressForm.data, {is_default: true});
    // return newAddressForm.data;
};

newAddressForm.afterDone = (data) => {
    refreshListShippingAddress(data.data.data);
    addressNewRegister.resetDefaultData();
    $("#shipping-address-area").fadeIn();
    $(".new-form-area").fadeOut();
};

// New Address Shipping
$(document).on('click', '.cancel-new-product-category', function(e) {


});