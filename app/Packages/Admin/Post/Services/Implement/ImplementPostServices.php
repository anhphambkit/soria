<?php
/**
 * Created by PhpStorm.
 * User: BiWin
 * Date: 19/12/2018
 * Time: 11:50 PM
 */
namespace App\Packages\Admin\Post\Services\Implement;

use App\Packages\Admin\Post\Repositories\PostRepository;
use App\Packages\Admin\Post\Services\PostServices;

class ImplementPostServices implements PostServices {

    private $repository;

    /**
     * ImplementPostServices constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->repository = $postRepository;
    }

    /**
     * @param $data
     * @return mixed|void
     */
    public function createPost($data)
    {
        // TODO: Implement createCategory() method.
        $this->repository->createPost($data);
    }

    /**
     * @return mixed
     */
    public function getAllPosts()
    {
        // TODO: Implement getAllPosts() method.
        return $this->repository->getAllPosts();
    }

    /**
     * @param $postCategoryId
     * @return mixed
     */
    public function getDetailPost($postCategoryId) {
        // TODO: Implement getDetailPost() method.
        return $this->repository->getDetailPost($postCategoryId);
    }

    /**
     * @param $postCategoryId
     * @param $data
     * @return mixed
     */
    public function updatePost($postCategoryId, $data) {
        unset($data['id']);
        return $this->repository->updatePos($postCategoryId, $data);
    }
}