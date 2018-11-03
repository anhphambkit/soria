class JSLib {

    /**
     * @param str: string to replace
     * @param replace (array): Replace string
     * @returns {*}
     */
    format(str, replace){
        [...replace].forEach( r => {
            str = str.replace('%s', r);
        });
        return str;
    }
}
export default JSLib