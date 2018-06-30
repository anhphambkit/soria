let Handlebars = require('handlebars');
Handlebars.registerHelper('priceFormat', function(price) {
    return parseFloat(price).toLocaleString(undefined) + ' đ';
});
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

        str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
            .replace(/\s+/g, '-') // collapse whitespace and replace by -
            .replace(/-+/g, '-'); // collapse dashes

        return str;

    }
}

export default StringUtil;