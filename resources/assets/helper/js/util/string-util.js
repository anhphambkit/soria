class StringUtil{
    constructor(){

    }

    /**
     * Auto generate slug from string
     * @param str
     * @returns {*}
     */
    generateSlug(str){
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();

        // remove accents, swap ñ for n, etc
        var from = "àáäâăạảãầấẩẫậằắẳẵặẻẽẹèéëêếềểễệìíĩỉịïîỏõọòóồốổỗộöôơủũụùúüûưứừửữựñçđ·/_,:;";
        var to   = "aaaaaaaaaaaaaaaaaaeeeeeeeeeeeeiiiiiiiooooooooooooouuuuuuuuuuuuuncd------";
        for (var i=0, l=from.length ; i<l ; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        str = str.replace(/\s+/g, '-')      // collapse whitespace and replace by -
            .replace(/[^a-z0-9 -]/g, '')    // remove invalid chars
            .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
            .replace(/\-\-+/g, '-')         // Replace multiple - with single -
            .replace(/-+/g, '-')            // collapse dashes
            .replace(/^-+/, '')             // Trim - from start of text
            .replace(/-+$/, '');            // Trim - from end of text

        return str;

    }
}

export default StringUtil;