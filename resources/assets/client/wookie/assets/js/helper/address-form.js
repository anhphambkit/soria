import AddressForm from '@componentResources/address-form';

let addressForm = new AddressForm();
addressForm.apiRefreshDistricts = API_ADDRESS.REFRESH_DISTRICTS;
addressForm.apiRefreshWards = API_ADDRESS.REFRESH_WARDS;
addressForm.init();