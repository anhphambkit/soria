import helper from '@helper/helper';
import SearchTable from '@componentResources/search-table';

let manageCategory = new SearchTable();
manageCategory.wrapperTable = '#manage-categories';
manageCategory.columns = [
    {
        title: "ID",
        data: null,
        render(data) {
            return '<a href="javascript:void(0);" product-category-id= '+data.id+' class="modal-edit-product-category">'+ data.name +'</a>'
        }
    },
    {
        title: "Name",
        data: 'name',
    },
    {
        title: "Slug",
        data: 'slug',
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
manageCategory.otherDefaultOption = {
    "drawCallback": function( settings ) {
        $(".modal-edit-product-category").click(function(){
            if(typeof editProductCategory === 'function'){
                editProductCategory(this);
            }
        });
        $('[data-toggle="tooltip"]').tooltip();
    },
};
manageCategory.urlSearch = URL.GEL_LIST_CATEGORIES;
manageCategory.init();
manageCategory.handleSearchBtn();
manageCategory.handleClearBtn();

window.refreshManageProductCategoryTable = function() {
    manageCategory.refreshTable()
}