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
     * @return mixed
     */
    public function getAllProducts()
    {
        // TODO: Implement getAllProducts() method.
        return $this->repository->getAllProducts();
    }

    /**
     * @param $productId
     * @return mixed
     */
    public function getDetailProduct($productId) {
        // TODO: Implement getDetailProduct() method.
        return $this->repository->getDetailProduct($productId);
    }

    /**
     * @param $productId
     * @param $data
     * @return mixed
     */
    public function updateProduct($productId, $data) {
        unset($data['id']);
        return $this->repository->updateProduct($productId, $data);
    }
}