const path = require('path');
module.exports = {
    resolve: {
        alias: {
            handlebars: 'handlebars/dist/handlebars.min.js',
            "@": path.resolve('resources/assets')
        }
    }
}
