<?php
namespace Packages\Product\Repositories\Eloquent;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Packages\Core\Traits\Repositories\PackageRepositoriesTrait;
use Packages\Product\Entities\Product;
use Packages\Product\Repositories\ProductRepositories;

class EloquentProductRepositories implements ProductRepositories
{
    use PackageRepositoriesTrait;

    private $relatedImageProductTable = 'product_related_images';
    private $catProductRelationTable = 'product_category_relation';

    /**
     * Attach related images to product
     * @param array $images: List media ID
     * @param $productId
     * @return boolean
     */
    public function attachRelatedImagesToProduct($images, $productId)
    {
        // Remove categories available before
        DB::table($this->relatedImageProductTable)->where('product_id', $productId)->delete();

        // Add categories
        foreach($images as $img){
            DB::table($this->relatedImageProductTable)->insert([
                'product_id'    => $productId,
                'media_id'        => $img,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);
        }

        return true;
    }

    /**
     * Detach related images from product
     * @param $productId
     * @return boolean
     */
    public function detachRelatedImagesToProduct($productId)
    {
        return DB::table($this->relatedImageProductTable)->where('product_id', $productId)->delete();
    }

    /**
     * Get related products
     * @param Product $product
     * @param int $limit
     * @return Collection
     */
    public function getRelatedProduct(Product $product, $limit = 5)
    {
        $catsOfProd = DB::table($this->catProductRelationTable)->where('product_id', $product->getKey())->get();
        $catsOfProd = $catsOfProd->map(function($c){
            return $c->cat_id;
        }); // List categories ID

        $result = DB::table($this->catProductRelationTable)->whereIn('cat_id', $catsOfProd)->where('product_id', '<>', $product->getKey())->inRandomOrder()->take($limit)->get();
        $products = collect([]);
        foreach ($result as $p){
            $products->push($this->get($p->product_id));
        }
        return $products;
    }
}