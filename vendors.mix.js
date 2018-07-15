let mix = require('laravel-mix');
require('dotenv').config();
const core = require('./webpack.config');

/*
 * Some config to load Handlebarsjs
 */
mix.webpackConfig(core);

mix.copyDirectory('resources/assets/vendors', 'public/assets/vendors');
