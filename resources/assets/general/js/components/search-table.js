import Table from '@componentResources/table';
import axios from 'axios';
axios.defaults.withCredentials = true;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

class SearchTable extends Table{
    constructor () {
        super();
        // U must define correct wrapper whenever use this | wrapper search filter
        this.wrapperSearchFilter = '.search-form';
        // Search button selector
        this.searchBtn = '[data-search-control="search"]';
        // Clear button selector
        this.clearBtn = '[data-search-control="clear"]';
    }

    /**
     * Reset data for search table
     */
    resetDataSearch() {
        $(this.wrapperSearchFilter)[0].reset();
    }

    /**
     * Set data for search table
     */
    prepareDataSearch() {
        this.dataSearch = $(this.wrapperSearchFilter).serializeJSON({
            useIntKeysAsArrayIndex: true,
            parseNulls: true,
            parseAll: true,
            parseWithFunction: (val, inputName) => {
                if(val === ''){
                    return null;
                }
                return val;
            }
        });
    }

    /**
     * Refresh table:
     */
    refreshTable() {
        this.destroyEmptyTable();
        this.prepareDataSearch();
        this.init(false, null, null);
    }

    /**
     * Action Search:
     */
    searchAction(){
        this.destroyEmptyTable();
        this.prepareDataSearch();
        let btnLoading = this.wrapperSearchFilter + ' ' + this.searchBtn;
        this.init(false, this.wrapperSearchFilter, btnLoading);
    }



    /**
     * Action Clear:
     */
    clearAction(){
        this.destroyEmptyTable();
        this.resetDataSearch();
        let btnLoading = this.wrapperSearchFilter + ' ' + this.clearBtn;
        this.init(true, this.wrapperSearchFilter, btnLoading);
    }

    /**
     * Disable all input when loading
     */
    disableFieldsWhenLoading() {
        $(this.wrapperSearchFilter + ' input').data('disabled', true);
    }

    /**
     * Event On Search Button
     */
    handleSearchBtn() {
        let selfSearch = this;
        $(this.wrapperSearchFilter + ' ' + this.searchBtn).on('click', function(e) {
            e.preventDefault();
            selfSearch.searchAction();
        });
        this.disableFieldsWhenLoading();
    }

    /**
     * Event On Clear Button
     */
    handleClearBtn() {
        let selfSearch = this;
        $(this.wrapperSearchFilter + ' ' + this.clearBtn).on('click', function(e) {
            e.preventDefault();
            selfSearch.clearAction();
        });
    }

    /**
     *  Init function:
     */
    init(isFirst = true, wrapperSearchFilter = null, btnLoading = null) {
        if(!isFirst) {
            this.prepareDataSearch();
        }
        this.prepareOptions(isFirst);
        // Loading:
        if (btnLoading !== null) this.loadingBtn(btnLoading);
        this.initTable(wrapperSearchFilter, btnLoading);
    }
}
export default SearchTable;