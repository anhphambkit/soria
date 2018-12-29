import SearchTable from '@componentResources/search-table';
import Helper from '@helper/helper';

let managePost = new SearchTable();
managePost.wrapperTable = '#manage-posts';
managePost.columns = [
    {
        title: "ID",
        data: 'id',
    },
    {
        title: "Name",
        data: null,
        render(data) {
            return '<a href="javascript:void(0);" post-id= '+data.id+' class="modal-edit-post">'+ data.name +'</a>'
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
managePost.otherDefaultOption = {
    "drawCallback": function( settings ) {
        $(".modal-edit-post").click(function(){
            if(typeof editPost === 'function'){
                editPost(this);
            }
        });
        $('[data-toggle="tooltip"]').tooltip();
    },
};
managePost.urlSearch = URL.GEL_LIST_POSTS;
managePost.init();
managePost.handleSearchBtn();
managePost.handleClearBtn();

window.refreshManagePostTable = function() {
    managePost.refreshTable()
}