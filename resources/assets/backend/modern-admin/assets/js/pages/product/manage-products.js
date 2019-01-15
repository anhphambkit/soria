import SearchTable from '@componentResources/search-table';
import Helper from '@helper/helper';

let manageProduct = new SearchTable();
manageProduct.wrapperTable = '#manage-products';
manageProduct.columns = [
    {
        title: "ID",
        data: 'id',
    },
    {
        title: "Name",
        data: null,
        render(data) {
            return '<a href="javascript:void(0);" product-id= '+data.id+' class="modal-edit-product">'+ data.name +'</a>'
        }
    },
    {
        title: "SKU",
        data: 'sku',
    },
    {
        title: "Price",
        data: 'price',
        render(data) {
            return Helper.formatCurrency(data);
        }
    },
    {
        title: "Sale Price",
        data: 'sale_price',
        render(data) {
            return Helper.formatCurrency(data);
        }
    },
    {
        title: "Publish",
        data: 'is_publish',
        render(data) {
            return Helper.renderPublishStatus(data);
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
        $(".modal-edit-product").click(function(){
            if(typeof editProduct === 'function'){
                editProduct(this);
            }
        });
        $('[data-toggle="tooltip"]').tooltip();
    },
};
manageProduct.urlSearch = URL.GEL_LIST_PRODUCTS;
manageProduct.init();
manageProduct.handleSearchBtn();
manageProduct.handleClearBtn();

window.refreshProductsTable = function() {
    manageProduct.refreshTable()
}