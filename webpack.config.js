const path = require('path');
module.exports = {
    resolve: {
        alias: {
            handlebars: 'handlebars/dist/handlebars.min.js',
            "@": path.resolve('resources/assets'),
            "@helper": path.resolve('resources/assets/helper/js'),
            "@componentResources": path.resolve('resources/assets/general/js/components'),
            "@incResources": path.resolve('resources/assets/general/js/inc'),
        }
    }
}
