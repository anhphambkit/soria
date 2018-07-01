let mix = require('laravel-mix');
require('dotenv').config();
const fs = require('fs');
const path = require('path');
const moduleFolder = './resources/assets/frontend';
// const core = require('./webpack/core.config');

/*
 * Some config to load Handlebarsjs
 */
// mix.webpackConfig(core);

/**
 * Scan all folder in parent dir
 * @param p: path to folder
 */
const dirs = p => fs.readdirSync(p).filter(f => fs.statSync(path.resolve(p, f)).isDirectory());

/**
 * Scan all js/scss files in folder
 * @param p: path to folder
 */
const files = (p) => {
    return fs.readdirSync(p).filter(f => {
        let extension = f.split('.').pop();
        return fs.statSync(path.resolve(p, f)).isFile() && (extension === 'js' || extension === 'scss');
    });
};

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
let modules = dirs(moduleFolder);
modules.forEach(function (module) {
    let jsInPackage = files('./resources/assets/frontend/' + module + '/js');
    jsInPackage.forEach(function (jsFile) {
        let jsPath = path.resolve(moduleFolder, module, 'js', jsFile);
        if (process.env.NODE_ENV === 'development') {
            mix.js(jsPath, 'public/frontend/' + module.toLowerCase() + '/assets/js/' + jsFile).sourceMaps();
        } else {
            mix.js(jsPath, 'public/frontend/' + module.toLowerCase() + '/assets/js/' + jsFile);
        }
    });

    let sassInPackage = files('./resources/assets/frontend/' + module + '/scss');
    sassInPackage.forEach(function (scssFile) {
        let sassPath = path.resolve(moduleFolder, module, 'scss', scssFile);
        let fileName = scssFile.substring(0, scssFile.length - 5) + '.css';
        if (process.env.NODE_ENV === 'development') {
            mix.sass(sassPath, 'public/frontend/' + module.toLowerCase() + '/assets/css/' + fileName).sourceMaps();
        } else {
            mix.sass(sassPath, 'public/frontend/' + module.toLowerCase() + '/assets/css/' + fileName);
        }
    });

    // Publish plugins + fonts
    mix.copyDirectory('resources/assets/frontend/' + module + '/plugins', 'public/frontend/' + module.toLowerCase() + '/assets/plugins');
    mix.copyDirectory('resources/assets/frontend/' + module + '/fonts', 'public/frontend/' + module.toLowerCase() + '/assets/fonts');
});
