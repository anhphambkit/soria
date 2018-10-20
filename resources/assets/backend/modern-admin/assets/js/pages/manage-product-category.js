import helper from '@helper/helper';
import SearchTable from '@componentResources/search-table';
import axios from 'axios';
import message from '@helper/config/messages';
import JSLib from '@helper/util/js-lib';


let manageCategory = new SearchTable();
manageCategory.wrapperTable = '#manage-categories';
manageCategory.columns = [
    {
        title: "ID",
        data: 'id',
    },
    {
        title: "Name",
        data: 'name',
    },
    // {
    //     title: "Action",
    //     data: null,
    //     orderable: false,
    //     render(data) {
    //         return helper.renderActionReset(data);
    //     }
    // }
];
manageCategory.urlSearch = URL.GEL_LIST_CATEGORIES;
manageCategory.init();
manageCategory.handleSearchBtn();
manageCategory.handleClearBtn();