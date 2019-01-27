<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/7/18
 * Time: 03:32
 */

namespace App\Packages\Admin\Product\Services\Implement;

use App\Packages\Admin\Product\Constants\CategoryProductConfig;
use App\Packages\Admin\Product\Constants\MediaProductConfig;
use App\Packages\Admin\Product\Repositories\ProductRepository;
use App\Packages\Admin\Product\Services\ProductServices;
use App\Packages\SystemGeneral\Repositories\CoreDBRepository;

class ImplementProductServices implements ProductServices {

    private $repository;
    private $coreDBRepository;

    /**
     * ImplementProductCategoryServices constructor.
     * @param ProductRepository $productRepository
     * @param CoreDBRepository $coreDBRepository
     */
    public function __construct(ProductRepository $productRepository, CoreDBRepository $coreDBRepository)
    {
        $this->repository = $productRepository;
        $this->coreDBRepository = $coreDBRepository;
    }

    /**
     * @param $data
     * @return mixed|void
     */
    public function createProduct($data)
    {
        // TODO: Implement createProduct() method.
        $product = $this->repository->createProduct($data);

        // Insert relation category product:
        $categories = $data['category_id'];
        $categoryProduct = [];
        foreach ($categories as $category) {
            $newCategoryProduct = [
                'product_id' => $product->id,
                'cate_id' => (int)$category
            ];
            array_push($categoryProduct, $newCategoryProduct);
        }
        $this->coreDBRepository->createNewRecordOfTable(CategoryProductConfig::CATEGORY_PRODUCT_RELATION_TBL, $categoryProduct);

        // Insert images features:
        $imgFeatures = $data['imgFeatures'];
        $imgFeaturesProduct = [];
        foreach ($imgFeatures as $imgFeature) {
            $newImgFeature = [
                'product_id' => $product->id,
                'media_id' => (int)$imgFeature
            ];
            array_push($imgFeaturesProduct, $newImgFeature);
        }
        $this->coreDBRepository->createNewRecordOfTable(MediaProductConfig::FEATURE_PRODUCT_TBL, $imgFeaturesProduct);

        // Insert images galleries:
        $imgGalleries = $data['imgGalleries'];
        $imgGalleriesProduct = [];
        foreach ($imgGalleries as $imgGallery) {
            $newImgGallery = [
                'product_id' => $product->id,
                'media_id' => (int)$imgGallery
            ];
            array_push($imgGalleriesProduct, $newImgGallery);
        }
        $this->coreDBRepository->createNewRecordOfTable(MediaProductConfig::GALLERY_PRODUCT_TBL, $imgGalleriesProduct);
    }

    /**
     * @param int|null $categoryId
     * @param bool $isHomepage
     * @return mixed
     */
    public function getAllProducts()
    {
        // TODO: Implement getAllProducts() method.
        return $this->repository->getAllProducts();
    }

    /**
     * @param int|null $categoryId
     * @param bool $isHomepage
     * @param bool $isBestSeller
     * @return mixed
     * @throws \Exception
     */
    public function getAllProductsByCategory(int $categoryId = null, bool $isHomepage = false, bool $isBestSeller = false)
    {
        try {
            $products = $this->repository->getAllProductsByCategory($categoryId, $isHomepage, $isBestSeller);
            if (!$isBestSeller) {
                $result = [];
                $productGroups = $products->mapWithKeys(function ($item) use (&$result) {
                    foreach ($item['categories'] as $category) {
                        if (!isset($result[$category['name']]))
                            $result[$category['name']] = [];
                        array_push($result[$category['name']], $item);
                    }
                    return $result;
                });
                return $productGroups;
            }
            return $products->unique();
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int $productId
     * @param bool $isPublish
     * @return mixed
     * @throws \Exception
     */
    public function getDetailProduct(int $productId, bool $isPublish = true) {
        // TODO: Implement getDetailProduct() method.
        return $this->repository->getDetailProduct($productId, $isPublish);
    }

    /**
     * @param $categories
     * @return mixed
     */
    public function getRelatedProductByCategories($categories) {
        $relatedProducts = [];
        foreach ($categories as $category) {
            $productOfCategory = $this->repository->getAllProductsByCategory($category['id']);
            $relatedProducts = array_merge($relatedProducts, $productOfCategory->toArray());
        }
        return $relatedProducts;
    }

    /**
     * @param $productId
     * @param $data
     * @return mixed
     */
    public function updateProduct($productId, $data) {
        // Insert relation category product:
        $categories = $data['category_id'];
        $categoryProduct = [];
        $whereDelete = [
            [
                'product_id', '=',  $productId
            ]
        ];
        foreach ($categories as $category) {
            $newCategoryProduct = [
                'product_id' => $productId,
                'cate_id' => (int)$category
            ];
            array_push($categoryProduct, $newCategoryProduct);
        }
        $this->coreDBRepository->deleteAndCreateNewRecordOfTable(CategoryProductConfig::CATEGORY_PRODUCT_RELATION_TBL, $whereDelete, $categoryProduct);

        // Insert images features:
        $imgFeatures = $data['imgFeatures'];
        $imgFeaturesProduct = [];
        foreach ($imgFeatures as $imgFeature) {
            $newImgFeature = [
                'product_id' => $productId,
                'media_id' => (int)$imgFeature
            ];
            array_push($imgFeaturesProduct, $newImgFeature);
        }
        $this->coreDBRepository->deleteAndCreateNewRecordOfTable(MediaProductConfig::FEATURE_PRODUCT_TBL, $whereDelete, $imgFeaturesProduct);

        // Insert images galleries:
        $imgGalleries = $data['imgGalleries'];
        $imgGalleriesProduct = [];
        foreach ($imgGalleries as $imgGallery) {
            $newImgGallery = [
                'product_id' => $productId,
                'media_id' => (int)$imgGallery
            ];
            array_push($imgGalleriesProduct, $newImgGallery);
        }
        $this->coreDBRepository->deleteAndCreateNewRecordOfTable(MediaProductConfig::GALLERY_PRODUCT_TBL, $whereDelete, $imgGalleriesProduct);

        unset($data['id']);
        unset($data['category_id']);
        unset($data['imgFeatures']);
        unset($data['imgGalleries']);
        return $this->repository->updateProduct($productId, $data);
    }

    /**
     * @param int $productId
     * @return mixed
     */
    public function checkProductPublish(int $productId) {
        return $this->repository->checkProductPublish($productId);
    }

    /**
     * @param array $productIds
     * @param array $quantityProducts
     * @return mixed
     * @throws \Exception
     */
    public function getProductsInCartFromProductIds(array $productIds, array $quantityProducts = []) {
        try {
            $products = $this->repository->getProductsInCartFromProductIds($productIds); // Get products info
            $products->map(function($product) use ($quantityProducts) { // Update quantity for each product
                if (array_key_exists($product->id, $quantityProducts)) {
                    $product['quantity'] = $quantityProducts[$product->id];
                }
                else {
                    $product['quantity'] = 1; // Default quantity 1
                }
                return $product;
            });
            return $products;
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}