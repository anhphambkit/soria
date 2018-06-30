<?php
$config = require(base_path('Packages/Frontend/Config/frontend.php'));
$configCustom = [
    'home'  => [
        'slider-slug' => 'home-slider', // Slug of banner which will use as slider in home page,
        'limit-feature-products' => 5,
        'limit-random-products' => 5,
        'categories' => ['cameras', 'laptop', 'mobile'],
    ],
    'limit-bestseller'  => 5,
    'limit-random'  => 5,
    'limit-related-products'  => 5,
    'limit-brands'  => 5,
];
return array_merge($config, $configCustom);