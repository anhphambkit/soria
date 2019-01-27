let Handlebars = require('handlebars');

// Handle bar:
Handlebars.registerHelper("featureProduct", function(medias) {
    return `/${medias[0].path_org}`;
});

Handlebars.registerHelper("formatCurrency", function(number) {
    return helperShop.currencyFormat(number);
});

Handlebars.registerHelper("urlProduct", function(slug, id) {
    return `/shop/product/detail/${slug}.${id}`;
});

let helperShop = {
    currencyFormat : function (num) {
        return (
            num
                .toFixed(0) // always two decimal digits
                .replace('.', ',') // replace decimal point character with ,
                .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' đ'
        ) // use . as a separator
    }
}

export { Handlebars, helperShop };