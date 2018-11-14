let mix = require('laravel-mix');
require('dotenv').config();
const fs = require('fs');
const path = require('path');
const themeFolder = './resources/assets/backend';
const core = require('./webpack.config');

let argv = require('yargs').argv;
let readdirp = require('readdirp');
// Require the module
let klawSync = require('klaw-sync');
/*
 * Some config to load Handlebarsjs
 */
mix.webpackConfig(core);
mix.disableNotifications();

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
    // Publish plugins + fonts
    if (fs.existsSync('./resources/assets/backend/' + theme + '/plugins')) {
        mix.copyDirectory('./resources/assets/backend/' + theme + '/plugins', 'public/assets/backend/' + theme.toLowerCase() + '/assets/plugins');
    }
    if (fs.existsSync('./resources/assets/backend/' + theme + '/fonts')) {
        mix.copyDirectory('./resources/assets/backend/' + theme + '/fonts', 'public/assets/backend/' + theme.toLowerCase() + '/assets/fonts');
    }

    // Publish app-assets theme:
    if (fs.existsSync('./resources/assets/backend/' + theme + '/app-assets')) {
        mix.copyDirectory('./resources/assets/backend/' + theme + '/app-assets', 'public/assets/backend/' + theme.toLowerCase() + '/app-assets');
    }

    let jsRoot = './resources/assets/backend/' + theme + '/assets/js';
    let cssRoot = './resources/assets/backend/' + theme + '/assets/scss';
    let allJsFilePaths = [];
    let allCssFilePaths = [];

    // Create an empty variable to be accesible in the closure
    let resultJsAllPaths;
    let resultCssAllPaths;

    try {
        resultJsAllPaths = klawSync(jsRoot);
        resultCssAllPaths = klawSync(cssRoot);
    } catch (err) {
        console.error(err);
    }

    resultJsAllPaths.forEach(function (resultPath) {
        if(fs.lstatSync(resultPath.path).isFile()) {
            let asset = resultPath.path;
            let isJS = asset.substr(asset.length - 3) === '.js';
            if(isJS){
                allJsFilePaths.push(
                    resultPath.path
                );
            }
        }
    });

    resultCssAllPaths.forEach(function (resultPath) {
        if(fs.lstatSync(resultPath.path).isFile()) {
            let asset = resultPath.path;
            let isSCSS = asset.substr(asset.length - 5) === '.scss';
            if (isSCSS) {
                let arrayPath = asset.split('/');
                let fileName = arrayPath[arrayPath.length - 1];
                let indexChar = fileName.indexOf("_");
                if (indexChar === -1) {
                    allCssFilePaths.push(
                        resultPath.path
                    );
                }
            }
        }
    });

    allJsFilePaths.forEach(function (jsFile) {
        let jsFileName = jsFile.split('resources/assets/backend/' + theme + '/assets/js/');
        let buildJsTo = path.resolve('public/assets/backend/' + theme + '/assets/js/', jsFileName[1]);
        mix.js(jsFile, buildJsTo).sourceMaps();
    });

    allCssFilePaths.forEach(function (cssFile) {
        let cssFileName = cssFile.split('resources/assets/backend/' + theme + '/assets/scss/');
        let cssAsset = cssFileName[1];
        cssAsset = cssAsset.substr(0, cssAsset.length - 4) + 'css';
        let buildCssTo = path.resolve('public/assets/backend/' + theme + '/assets/css/', cssAsset);
        mix.sass(cssFile, buildCssTo);
    });

});