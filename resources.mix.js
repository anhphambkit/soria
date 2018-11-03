let mix = require('laravel-mix');
require('dotenv').config();
const fs = require('fs');
const path = require('path');
let argv = require('yargs').argv;
let readdirp = require('readdirp');
const core = require('./webpack.config');

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
 | Mix BACKEND
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
const rootFolder = 'resources/assets';
let folders = dirs(rootFolder);
folders.forEach(function (folder) {
    let portalPath = rootFolder + '/' + folder;
    if (folder === 'backend' || folder === 'frontend') {
        let portalFolders = dirs(portalPath);
        portalFolders.forEach(function (portalFolder) {
            let sourceRoot = portalPath + '/' + portalFolder;

            // Publish plugins + fonts
            if (fs.existsSync(sourceRoot + '/plugins')) {
                mix.copyDirectory(sourceRoot + '/plugins', 'public/assets/' + folder + '/' + portalFolder.toLowerCase() + '/assets/plugins');
            }
            if (fs.existsSync(sourceRoot + '/fonts')) {
                mix.copyDirectory(sourceRoot + '/fonts', 'public/assets/' + folder + '/' + portalFolder.toLowerCase() + '/assets/fonts');
            }
            // Publish app-assets theme:
            if (fs.existsSync(sourceRoot + '/app-assets')) {
                mix.copyDirectory(sourceRoot + '/app-assets', 'public/assets/' + folder + '/' + portalFolder.toLowerCase() + '/app-assets');
            }

            // Mix:
            mixResources(sourceRoot + '/assets');
        })
    }
    else if (folder === 'vendors') {
        if (fs.existsSync(portalPath)) {
            mix.copyDirectory(portalPath, 'public/assets/' + folder);
        }
    }
    else {
        mixResources(portalPath);
    }
});

function mixResources(portalPath) {
    // Convert public path:
    let sourcePath = portalPath.split('resources/');
    let publicPath = path.resolve('public/', sourcePath[1]);

    let jsRoot = portalPath + '/js';
    let cssRoot = portalPath + '/scss';
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
        let jsFileName = jsFile.split(portalPath + '/js/');
        let buildJsTo = publicPath + '/js/' + jsFileName[1];
        mix.js(jsFile, buildJsTo).sourceMaps();
    });

    allCssFilePaths.forEach(function (cssFile) {
        let cssFileName = cssFile.split(portalPath + '/scss/');
        let cssAsset = cssFileName[1];
        cssAsset = cssAsset.substr(0, cssAsset.length - 4) + 'css';
        let buildCssTo = publicPath + '/css/' + cssAsset;
        mix.sass(cssFile, buildCssTo);
    });
}