<?php
namespace Packages\Product\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Packages\Product\Entities\Product;

interface ProductRepositories
{
    /**
     * Attach related images to product
     * @param $images
     * @param $productId
     * @return boolean
     */
    public function attachRelatedImagesToProduct($images, $productId);

    /**
     * Detach related images from product
     * @param $productId
     * @return boolean
     */
    public function detachRelatedImagesToProduct($productId);

    /**
     * Simple filter model data
     * @param array $data: ['is_active' => true, 'name' => 'ABC']
     */
    public function filter($data);

    /**
     * Get related products
     * @param Product $product
     * @param int $limit
     * @return Collection
     */
    public function getRelatedProduct(Product $product, $limit = 5);


}