let mix = require('laravel-mix');
require('dotenv').config();
const fs = require('fs');
const path = require('path');
const themeFolder = './resources/assets/backend';
const core = require('./webpack.config');

/*
 * Some config to load Handlebarsjs
 */
mix.webpackConfig(core);

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
let themes = dirs(themeFolder);
themes.forEach(function (theme) {
    let jsInTheme = files('./resources/assets/backend/' + theme + '/assets/js');
    jsInTheme.forEach(function (jsFile) {
        let jsPath = path.resolve(themeFolder, theme, 'assets', 'js', jsFile);
        if (process.env.NODE_ENV === 'development') {
            mix.js(jsPath, 'public/backend/' + theme.toLowerCase() + '/assets/js/' + jsFile).sourceMaps();
        } else {
            mix.js(jsPath, 'public/backend/' + theme.toLowerCase() + '/assets/js/' + jsFile);
        }
    });

    let sassInTheme = files('./resources/assets/backend/' + theme + '/assets/scss');
    sassInTheme.forEach(function (scssFile) {
        let sassPath = path.resolve(themeFolder, theme, 'assets', 'scss', scssFile);
        let fileName = scssFile.substring(0, scssFile.length - 5) + '.css';
        if (process.env.NODE_ENV === 'development') {
            mix.sass(sassPath, 'public/backend/' + theme.toLowerCase() + '/assets/css/' + fileName).sourceMaps();
        } else {
            mix.sass(sassPath, 'public/backend/' + theme.toLowerCase() + '/assets/css/' + fileName);
        }
    });

    // Publish plugins + fonts
    mix.copyDirectory('resources/assets/backend/' + theme + '/app-assets', 'public/backend/' + theme.toLowerCase() + '/app-assets');

    // Sub JS folders:
    let subJSFolder = './resources/assets/backend/' + theme + '/assets/js';
    let jsFolders = dirs(subJSFolder);
    jsFolders.forEach(function (jsFolder) {
        let jsInPackage = files('./resources/assets/backend/' + theme + '/assets/js/' + jsFolder);
        jsInPackage.forEach(function (jsFile) {
            let jsPath = path.resolve(subJSFolder, jsFolder, jsFile);
            if (process.env.NODE_ENV === 'development') {
                mix.js(jsPath, 'public/backend/' + theme.toLowerCase() + '/assets/js/' + jsFolder.toLowerCase() + '/' + jsFile).sourceMaps();
            } else {
                mix.js(jsPath, 'public/backend/' + theme.toLowerCase() + '/assets/js/' + jsFolder.toLowerCase() + '/' + jsFile);
            }
        });
    });

    // Sub CSS folders:
    let subCSSFolder = './resources/assets/backend/' + theme + '/assets/scss/custom';
    let cssFolders = dirs(subCSSFolder);
    cssFolders.forEach(function (cssFolder) {
        let sassInPackage = files('./resources/assets/backend/' + theme + '/assets/scss/custom/' + cssFolder);
        sassInPackage.forEach(function (scssFile) {
            let sassPath = path.resolve(subCSSFolder, cssFolder, scssFile);
            let fileName = scssFile.substring(0, scssFile.length - 5) + '.css';
            if (process.env.NODE_ENV === 'development') {
                mix.sass(sassPath, 'public/backend/' + theme.toLowerCase() + '/assets/css/custom/' + cssFolder.toLowerCase() + '/' + fileName).sourceMaps();
            } else {
                mix.sass(sassPath, 'public/backend/' + theme.toLowerCase() + '/assets/css/custom/' + cssFolder.toLowerCase() + '/' + fileName);
            }
        });
    });
});
