<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class CreateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $sitemap = App::make('sitemap');

        // add home pages mặc định
        $sitemap->add(route('client.page.home'), Carbon::now(), '1.0', 'daily');

        // add shop page mặc định
        $sitemap->add(route('client.shop.index'), Carbon::now(), '0.8', 'daily');

        // add blog pages mặc định
        $sitemap->add(route('client.blog.home'), Carbon::now(), '0.8', 'daily');

//        // add shop cart page mặc định
//        $sitemap->add(route('client.shop.cart'), Carbon::now(), '0.8', 'daily');
//
//        // add shop checkout shipping page mặc định
//        $sitemap->add(route('client.shop.checkout_shipping'), Carbon::now(), '0.8', 'daily');
//
//        // add shop checkout payment mặc định
//        $sitemap->add(route('client.shop.checkout_payment'), Carbon::now(), '0.8', 'daily');
//
//        // add success ordered page mặc định
//        $sitemap->add(route('client.shop.complete_order'), Carbon::now(), '0.8', 'daily');

        // add bài viết
        $posts = DB::table('posts')
                    ->orderBy('created_at', 'desc')
                    ->get();
        foreach ($posts as $post) {
            $sitemap->add(route('client.post.detail', ["{$post->slug}.{$post->id}"]), $post->created_at, '0.6', 'daily');
        }

        // add danh mục bài viết:
        $postCategories = DB::table('post_categories')
                            ->orderBy('created_at', 'desc')
                            ->get();

        foreach ($postCategories as $postCategory) {
            $sitemap->add(route('client.blog.category_page', ["{$postCategory->slug}.{$postCategory->id}"]), $postCategory->created_at, '0.7', 'daily');
        }

        // add sản phẩm
        $products = DB::table('products')
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($products as $product) {
            $sitemap->add(route('client.product.detail', ["{$product->slug}.{$product->id}"]), $product->created_at, '0.6', 'daily');
        }

        // add danh mục sản phẩm:
        $productCategories = DB::table('product_categories')
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($productCategories as $productCategory) {
            $sitemap->add(route('client.shop.category_page', ["{$productCategory->slug}.{$productCategory->id}"]), $productCategory->created_at, '0.7', 'daily');
        }

        // lưu file và phân quyền
        $sitemap->store('xml', 'sitemap');
        if (File::exists(public_path('sitemap.xml'))) {
            chmod(public_path('sitemap.xml'), 0777);
        }
    }
}
