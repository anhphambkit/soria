<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/15/18
 * Time: 11:54
 */

namespace App\Packages\Admin\Post\Services\Implement;

use App\Packages\Admin\Post\Repositories\PostCategoryRepository;
use App\Packages\Admin\Post\Services\PostCategoryServices;

class ImplementPostCategoryServices implements PostCategoryServices{

    private $repository;

    /**
     * ImplementPostCategoryServices constructor.
     * @param PostCategoryRepository $postCategoryRepository
     */
    public function __construct(PostCategoryRepository $postCategoryRepository)
    {
        $this->repository = $postCategoryRepository;
    }

    /**
     * @param $data
     * @return mixed|void
     */
    public function createPostCategory($data)
    {
        // TODO: Implement createCategory() method.
        $this->repository->createPostCategory($data);
    }

    /**
     * @return mixed
     */
    public function getAllPostCategory()
    {
        // TODO: Implement getAllCategory() method.
        return $this->repository->getAllPostCategory();
    }

    /**
     * @param $postCategoryId
     * @return mixed
     */
    public function getDetailPostCategory($postCategoryId) {
        // TODO: Implement getDetailPostCategory() method.
        return $this->repository->getDetailPostCategory($postCategoryId);
    }

    /**
     * @param $postCategoryId
     * @param $data
     * @return mixed
     */
    public function updatePostCategory($postCategoryId, $data) {
        unset($data['id']);
        return $this->repository->updatePostCategory($postCategoryId, $data);
    }
}