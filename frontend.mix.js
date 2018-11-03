let mix = require('laravel-mix');
require('dotenv').config();
const fs = require('fs');
const path = require('path');
let argv = require('yargs').argv;
let readdirp = require('readdirp');
const core = require('./webpack.config');
const moduleFolder = './resources/assets/frontend';
// Require the module
let klawSync = require('klaw-sync');

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
let modules = dirs(moduleFolder);

modules.forEach(function (module) {
    // Publish plugins + fonts
    if (fs.existsSync('resources/assets/frontend/' + module + '/plugins')) {
        mix.copyDirectory('resources/assets/frontend/' + module + '/plugins', 'public/assets/frontend/' + module.toLowerCase() + '/assets/plugins');
    }
    if (fs.existsSync('resources/assets/frontend/' + module + '/fonts')) {
        mix.copyDirectory('resources/assets/frontend/' + module + '/fonts', 'public/assets/frontend/' + module.toLowerCase() + '/assets/fonts');
    }

    // Publish app-assets theme:
    if (fs.existsSync('./resources/assets/frontend/' + module + '/app-assets')) {
        mix.copyDirectory('./resources/assets/frontend/' + module + '/app-assets', 'public/assets/frontend/' + module.toLowerCase() + '/app-assets');
    }

    // Mix JS/CSS:
    let jsRoot = './resources/assets/frontend/' + module + '/js';
    let cssRoot = './resources/assets/frontend/' + module + '/scss';
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
        let jsFileName = jsFile.split('resources/assets/');
        let buildJsTo = path.resolve('public/assets', jsFileName[1]);
        mix.js(jsFile, buildJsTo).sourceMaps();
    });

    allCssFilePaths.forEach(function (cssFile) {
        let cssFileName = cssFile.split('resources/assets/frontend/scss/');
        let cssAsset = cssFileName[1];
        cssAsset = cssAsset.substr(0, cssAsset.length - 4) + 'css';
        let buildCssTo = path.resolve('public/assets/frontend/css', cssAsset);
        mix.sass(cssFile, buildCssTo);
    });
});