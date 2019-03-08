import SearchTable from '@componentResources/search-table';
import Helper from '@helper/helper';

let manageProduct = new SearchTable();
manageProduct.wrapperTable = '#manage-orders';
manageProduct.columns = [
    {
        title: "ID",
        data: 'id',
    },
    {
        title: "Customer",
        data: 'customer',
    },
    {
        title: "Mobile",
        data: 'mobile_phone',
    },
    {
        title: "Email",
        data: 'email',
    },
    {
        title: "Total Price",
        data: 'total_price',
        render(data) {
            return Helper.formatCurrency(data);
        }
    },
    {
        title: "Address",
        data: 'address',
    },
    {
        title: "Status",
        data: 'null',
        render(data) {
            return `<span class="badge badge-primary">NEW</span>`;
        }
    },
    {
        title: "Created Date",
        data: 'created_at'
    },
    {
        title: "Updated Date",
        data: 'updated_at'
    }

];
manageProduct.otherDefaultOption = {
    "drawCallback": function( settings ) {
        // $(".modal-edit-product").click(function(){
        //     if(typeof editProduct === 'function'){
        //         editProduct(this);
        //     }
        // });
        $('[data-toggle="tooltip"]').tooltip();
    },
};
manageProduct.urlSearch = URL.GET_ALL_ORDERS;
manageProduct.init();
manageProduct.handleSearchBtn();
manageProduct.handleClearBtn();

window.refreshProductsTable = function() {
    manageProduct.refreshTable()
}