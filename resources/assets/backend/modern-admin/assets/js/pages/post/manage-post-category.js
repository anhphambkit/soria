import helper from '@helper/helper';
import SearchTable from '@componentResources/search-table';

let manageCategory = new SearchTable();
manageCategory.wrapperTable = '#manage-categories';
manageCategory.columns = [
    {
        title: "ID",
        data: 'id',
    },
    {
        title: "Name",
        data: null,
        render(data) {
            return '<a href="javascript:void(0);" post-category-id= '+data.id+' class="modal-edit-post-category">'+ data.name +'</a>'
        }
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
        $(".modal-edit-post-category").click(function(){
            if(typeof editPostCategory === 'function'){
                editPostCategory(this);
            }
        });
        $('[data-toggle="tooltip"]').tooltip();
    },
};
manageCategory.urlSearch = URL.GEL_LIST_CATEGORIES;
manageCategory.init();
manageCategory.handleSearchBtn();
manageCategory.handleClearBtn();

window.refreshManagePostCategoryTable = function() {
    manageCategory.refreshTable()
}