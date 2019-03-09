import SearchTable from '@componentResources/search-table';
import Helper from '@helper/helper';

let manageProduct = new SearchTable();
manageProduct.wrapperTable = '#manage-orders';
manageProduct.columns = [
    {
        title: "ID",
        data: 'id',
        render(data) {
            return `<a href="/admin/invoice-order/detail/${data}" class="detail-order">${data}</a>`
        }
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
        data: 'status_name',
        render(data) {
            return `<span class="badge badge-primary">${data}</span>`;
        }
    },
    {
        title: "Created Date",
        data: 'created_at'
    },
    {
        title: "Updated Date",
        data: 'updated_at'
    },
    {
        title: "Action",
        data: null,
        render(data) {
            return `<span class="dropdown">
                        <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
                        <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right dropdown-menu-custom">
                            <a href="/admin/invoice-order/detail/${data.id}" class="dropdown-item"><i class="la la-eye"></i> Detail Order</a>
                            <a href="#" class="dropdown-item"><i class="la la-check"></i> Complete Order</a>
                            <a href="#" class="dropdown-item"><i class="la la-trash"></i> Delete Order</a>
                        </span>
                    </span>`;
        }
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