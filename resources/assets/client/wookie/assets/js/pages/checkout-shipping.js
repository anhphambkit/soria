import Form from '@incResources/form';
import helper from "@helper/helper"

// Define Form
let addressForm = new Form();
addressForm.wrapper = '#form-create-default-address';
addressForm.url = API_CHECKOUT.CREATE_DEFAULT_ADDRESS_SHIPPING;
addressForm.urlCancel = "#";

// Handle event on form
addressForm.handleSubmit();
addressForm.handleCancel();
// productForm.beforeSubmit = () => {
// };