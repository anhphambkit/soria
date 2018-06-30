<?php
namespace Packages\Product\Services\Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Packages\Core\Traits\Services\PackageServicesTrait;
use Packages\Product\Entities\Product;
use Packages\Product\Custom\Repositories\ProductRepositories;
use Packages\Product\Services\ProductServices;
use Packages\Product\Custom\Repositories\ProductCategoryRepositories;

class EloquentProductServices implements ProductServices {
    use PackageServicesTrait;

    private $repositories;
    private $productCategoryRepositories;

    public function __construct(ProductRepositories $repositories, ProductCategoryRepositories $productCategoryRepositories)
    {
        $this->repositories = $repositories;
        $this->repositories->setModel(new Product());
        $this->productCategoryRepositories = $productCategoryRepositories;
    }

    /**
     * Create/Update product
     * @param array $data
     * @param int/null $id: $id = null will create and $id != null will update
     * @return Product|null
     */
    public function crud($data, $id = null)
    {
        // Don't set sale_value if sale_type isn't set
        if(isset($data['sale_type']) && ($data['sale_type'] === 0 || $data['sale_type'] === '0')){
            unset($data['sale_type']);
        }

        DB::beginTransaction();
        try {
            if(is_null($id)){
                $product = $this->repositories->create($data);
            } else {
                $this->repositories->update($id, $data);
                $product = $this->repositories->get($id);
            }

            if(!empty($data['categories'])){
                $this->productCategoryRepositories->attachCategoriesToProduct($data['categories'], $product->getKey());
            } else {
                $this->productCategoryRepositories->attachCategoriesToProduct([], $product->getKey());
            }

            if(!empty($data['related_img'])){
                $this->repositories->attachRelatedImagesToProduct($data['related_img'], $product->getKey());
            } else {
                $this->repositories->attachRelatedImagesToProduct([], $product->getKey());
            }

            if(!empty($data['price'])) {
                $data['sale_price'] = $this->finalPrice($product);
                $this->repositories->update($product->getKey(), $data);
            }

            DB::commit();
        } catch (\Exception $e){
            dd($e->getMessage());
            activity()->withProperties(['data'  => $data, 'msg' => 'Create/Update Product'])->log($e->getMessage());
            DB::rollback();
            return null;
        }
        return $product;
    }

    /**
     * Delete product
     * @param $id
     * @return boolean
     */
    public function delete($id){
        DB::beginTransaction();
        try {
            $this->productCategoryRepositories->detachCategoriesToProduct($id);
            $this->repositories->detachRelatedImagesToProduct($id);
            $result = $this->repositories->delete($id);
            DB::commit();
        } catch (\Exception $e){
            DB::rollback();
            return null;
        }
        return $result;
    }

    /**
     * The final price which customer will buy product
     * @param Product $product
     * @return integer
     */
    public function finalPrice(Product $product)
    {
        if(empty($product->sale_type))
            return $product->price;

        $saleValue = (int) $product->sale_value;
        $orgPrice = (int) $product->price;
        if($product->sale_type === 'P'){ // Percent sale_off
            return $orgPrice * ((100 - $saleValue)/100);
        } else {
            return $orgPrice - $saleValue;
        }
    }

    /**
     * Get related products
     * @param Product $product
     * @param int $limit
     * @return Collection
     */
    public function getRelatedProduct(Product $product, $limit = 5)
    {
        return $this->repositories->getRelatedProduct($product, $limit);
    }
}