const path = require('path');
module.exports = {
    resolve: {
        alias: {
            handlebars: 'handlebars/dist/handlebars.min.js',
            "@theme": path.resolve(__dirname, '../Packages/Theme/Resources/assets/js')
        }
    }
}
