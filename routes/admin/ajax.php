<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/15/18
 * Time: 11:37
 */

/*********************************************************
 *
 *                  ROUTE FOR ADMIN MODULE
 *
 *********************************************************/
Route::domain('{subDomain}.{mainDomain}')->group(function () {
    /************ Router Media Product **********/
    /** Router Upload */
    Route::prefix('media-product')->group(function() {
        Route::post('/image-feature', 'Product\MediaProductController@uploadSingleImageFeatureProduct')->name('admin_ajax.media_product.image_feature');
        Route::post('/image-gallery', 'Product\MediaProductController@uploadSingleImageGalleryProduct')->name('admin_ajax.media_product.image_gallery');
    });

    /************ Router Product ************** */
    Route::prefix('product')->group(function () {
        // Product
        Route::post('/create-product', 'Product\ProductController@createProduct')->name('admin_ajax.product.create_product');
        Route::get('/get-all-products', 'Product\ProductController@getAllProducts')->name('admin_ajax.product.get_all_products');
        Route::get('/get-detail-product', 'Product\ProductController@getDetailProduct')->name('admin_ajax.product.get_detail_product');
        Route::patch('/update-product', 'Product\ProductController@updateProduct')->name('admin_ajax.product.update_product');

        // Product Category
        Route::post('/createProductCategory', 'Product\ProductCategoryController@createProductCategory')->name('admin_ajax.product.create_product_category');
        Route::get('/getAllProductCategory', 'Product\ProductCategoryController@getAllProductCategory')->name('admin_ajax.product.get_all_product_category');
        Route::get('/getDetailProductCategory', 'Product\ProductCategoryController@getDetailProductCategory')->name('admin_ajax.product.get_detail_product_category');
        Route::patch('/updateProductCategory', 'Product\ProductCategoryController@updateProductCategory')->name('admin_ajax.product.update_product_category');
    });

    /************ Router Post ************** */
    Route::prefix('post')->group(function () {
        // Post Category
        Route::post('/createPostCategory', 'Post\PostCategoryController@createPostCategory')->name('admin_ajax.post.create_post_category');
        Route::get('/getAllPostCategory', 'Post\PostCategoryController@getAllPostCategory')->name('admin_ajax.post.get_all_post_category');
        Route::get('/getDetailPostCategory', 'Post\PostCategoryController@getDetailPostCategory')->name('admin_ajax.post.get_detail_post_category');
        Route::patch('/updatePostCategory', 'Post\PostCategoryController@updatePostCategory')->name('admin_ajax.post.update_post_category');
    });
});