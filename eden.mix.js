let mix = require('laravel-mix');
const path = require('path');
let argv = require('yargs').argv;
const core = require('./webpack/core.config');
/*
 * Some config to load Handlebarsjs
 */
mix.webpackConfig(core);

// Build specific file npm run build -- --env.pkg=frontend --env.src=js/banner/banner.list.js
let env = argv.env;
let pName = env.pkg;
let asset = env.src;
let custom = env.custom;

pName = pName.charAt(0).toUpperCase() + pName.slice(1); // Uppercase package name
let buildFrom = path.resolve('Packages', pName, 'Resources/assets', asset);
if(custom){
    buildFrom = path.resolve('Packages', pName, 'Custom/Resources/assets', asset);
}
let buildTo = custom ? path.resolve('public/packages', pName.toLowerCase(), 'custom','assets', asset) : path.resolve('public/packages', pName.toLowerCase(), 'assets', asset);
let isJS = asset.substr(asset.length - 3) === '.js';
if(isJS){
    mix.js(buildFrom, buildTo).sourceMaps();
} else{
    asset = asset.split('/');
    asset = asset[asset.length-1];
    asset = asset.substr(0, asset.length - 4) + 'css';
    buildTo = custom ? path.resolve('public/packages', pName.toLowerCase(), 'custom','assets/css', asset) : path.resolve('public/packages', pName.toLowerCase(), 'assets/css', asset);
    mix.sass(buildFrom, buildTo);
}