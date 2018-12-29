let mix = require('laravel-mix');
require('dotenv').config();
const fs = require('fs');
const path = require('path');
let argv = require('yargs').argv;
let readdirp = require('readdirp');
const core = require('./webpack.config');
const moduleFolder = './resources/assets/client';
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
    if (fs.existsSync('resources/assets/client/' + module + '/plugins')) {
        mix.copyDirectory('resources/assets/client/' + module + '/plugins', 'public/assets/client/' + module.toLowerCase() + '/assets/plugins');
    }

    if (fs.existsSync('resources/assets/client/' + module + '/fonts')) {
        mix.copyDirectory('resources/assets/client/' + module + '/fonts', 'public/assets/client/' + module.toLowerCase() + '/assets/fonts');
    }

    // Publish app-assets theme:
    if (fs.existsSync('./resources/assets/client/' + module + '/app-assets')) {
        mix.copyDirectory('./resources/assets/client/' + module + '/app-assets', 'public/assets/client/' + module.toLowerCase() + '/app-assets');
    }

    // Publish app-assets theme:
    if (fs.existsSync('./resources/assets/client/' + module + '/app-assets/sass')) {
        // Mix JS/CSS:
        let cssPackageRoot = './resources/assets/client/' + module + '/app-assets/sass';
        let allCssPackageFilePaths = [];

        // Create an empty variable to be accesible in the closure
        let resultCssPackageAllPaths;

        try {
            resultCssPackageAllPaths = klawSync(cssPackageRoot);
        } catch (err) {
            console.error(err);
        }

        if (resultCssPackageAllPaths !== undefined) {
            resultCssPackageAllPaths.forEach(function (resultPath) {
                if(fs.lstatSync(resultPath.path).isFile()) {
                    let asset = resultPath.path;
                    let isSCSS = asset.substr(asset.length - 5) === '.scss';
                    if (isSCSS) {
                        let arrayPath = asset.split('/');
                        let fileName = arrayPath[arrayPath.length - 1];
                        let indexChar = fileName.indexOf("_");
                        if (indexChar === -1) {
                            allCssPackageFilePaths.push(
                                resultPath.path
                            );
                        }
                    }
                }
            });
        }

        if (allCssPackageFilePaths.length > 0) {
            allCssPackageFilePaths.forEach(function (cssFile) {
                let cssFileName = cssFile.split('resources/assets/client/' + module + '/app-assets/sass/');
                let cssAsset = cssFileName[1];
                cssAsset = cssAsset.substr(0, cssAsset.length - 4) + 'css';
                let buildCssTo = path.resolve('public/assets/client/' + module + '/app-assets/css/', cssAsset);
                mix.sass(cssFile, buildCssTo);
            });
        }
    }

    // Mix JS/CSS:
    let jsRoot = './resources/assets/client/' + module + '/assets/js';
    let cssRoot = './resources/assets/client/' + module + '/assets/scss';
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

    if (resultJsAllPaths !== undefined) {
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
    }

    if (resultCssAllPaths !== undefined) {
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
    }

    if (allJsFilePaths.length > 0) {
        allJsFilePaths.forEach(function (jsFile) {
            let jsFileName = jsFile.split('resources/assets/client/' + module + '/assets/js/');
            let buildJsTo = path.resolve('public/assets/client/' + module + '/assets/js/', jsFileName[1]);
            mix.js(jsFile, buildJsTo).sourceMaps();
        });
    }

    if (allCssFilePaths.length > 0) {
        allCssFilePaths.forEach(function (cssFile) {
            let cssFileName = cssFile.split('resources/assets/client/' + module + '/assets/scss/');
            let cssAsset = cssFileName[1];
            cssAsset = cssAsset.substr(0, cssAsset.length - 4) + 'css';
            let buildCssTo = path.resolve('public/assets/client/' + module + '/assets/css/', cssAsset);
            mix.sass(cssFile, buildCssTo);
        });
    }

});