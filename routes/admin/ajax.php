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
        Route::delete('/delete-product-category', 'Product\ProductCategoryController@deleteProductCategory')->name('admin_ajax.product.delete_product_category');
    });

    /************ Router Post ************** */
    Route::prefix('post')->group(function () {
        /************ Router Media Product **********/
        /** Router Upload */
        Route::prefix('media')->group(function() {
            Route::post('/image-feature', 'Post\MediaPostController@uploadImageFeaturePost')->name('admin_ajax.post.media.image_feature');
            Route::post('/image-gallery', 'Post\MediaPostController@uploadImageGalleryPost')->name('admin_ajax.post.media.image_gallery');
            Route::post('/image-slide', 'Post\MediaPostController@uploadImageSlidePost')->name('admin_ajax.post.media.image_slide');
            Route::post('/image-secondary', 'Post\MediaPostController@uploadImageSecondaryPost')->name('admin_ajax.post.media.image_secondary');
            Route::post('/media-feature', 'Post\MediaPostController@uploadMediaFeaturePost')->name('admin_ajax.post.media.media_feature');
        });

        // Post
        Route::post('/create-post', 'Post\PostController@createPost')->name('admin_ajax.post.create_post');
        Route::get('/get-all-posts', 'Post\PostController@getAllPosts')->name('admin_ajax.post.get_all_posts');
        Route::get('/get-detail-post', 'Post\PostController@getDetailPost')->name('admin_ajax.post.get_detail_post');
        Route::patch('/update-post', 'Post\PostController@updatePost')->name('admin_ajax.post.update_post');

        // Post Category
        Route::post('/createPostCategory', 'Post\PostCategoryController@createPostCategory')->name('admin_ajax.post.create_post_category');
        Route::get('/getAllPostCategory', 'Post\PostCategoryController@getAllPostCategory')->name('admin_ajax.post.get_all_post_category');
        Route::get('/getDetailPostCategory', 'Post\PostCategoryController@getDetailPostCategory')->name('admin_ajax.post.get_detail_post_category');
        Route::patch('/updatePostCategory', 'Post\PostCategoryController@updatePostCategory')->name('admin_ajax.post.update_post_category');
    });

    /************ Router Invoice Orders ************** */
    Route::prefix('invoice-order')->group(function () {
        Route::get('/get-all-orders', 'InvoiceOrder\InvoiceOrderController@getAllOrders')->name('admin_ajax.invoice_order.get_all_orders');
    });
});