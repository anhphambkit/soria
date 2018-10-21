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
manageCategory.urlSearch = URL.GEL_LIST_CATEGORIES;
manageCategory.init();
manageCategory.handleSearchBtn();
manageCategory.handleClearBtn();