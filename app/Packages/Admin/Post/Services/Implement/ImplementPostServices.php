<?php
/**
 * Created by PhpStorm.
 * User: BiWin
 * Date: 19/12/2018
 * Time: 11:50 PM
 */
namespace App\Packages\Admin\Post\Services\Implement;

use App\Packages\Admin\Post\Constants\MediaPostConfig;
use App\Packages\Admin\Post\Repositories\PostRepository;
use App\Packages\Admin\Post\Services\PostCategoryServices;
use App\Packages\Admin\Post\Services\PostServices;
use App\Packages\Admin\Post\Constants\PostCategoryConfig;
use App\Packages\SystemGeneral\Constants\ReferencesConfig;
use App\Packages\SystemGeneral\Repositories\CoreDBRepository;
use App\Packages\SystemGeneral\Repositories\ReferenceRepository;

class ImplementPostServices implements PostServices {

    private $repository;
    private $postCategoryServices;
    private $coreDBRepository;
    private $referenceRepository;

    /**
     * ImplementPostServices constructor.
     * @param PostRepository $postRepository
     * @param PostCategoryServices $postCategoryServices
     * @param CoreDBRepository $coreDBRepository
     * @param ReferenceRepository $referenceRepository
     */
    public function __construct(PostRepository $postRepository, PostCategoryServices $postCategoryServices, CoreDBRepository $coreDBRepository, ReferenceRepository $referenceRepository)
    {
        $this->repository = $postRepository;
        $this->postCategoryServices = $postCategoryServices;
        $this->coreDBRepository = $coreDBRepository;
        $this->referenceRepository = $referenceRepository;
    }

    /**
     * @param $data
     * @return mixed|void
     */
    public function createPost($data)
    {
        // TODO: Implement createCategory() method.
        $post = $this->repository->createPost($data);
        // Insert relation category product:
        $categories = $data['category_id'];
        $categoryPost = [];
        foreach ($categories as $category) {
            $newCategoryPost = [
                'post_id' => $post->id,
                'cate_id' => (int)$category
            ];
            array_push($categoryPost, $newCategoryPost);
        }
        $this->coreDBRepository->createNewRecordOfTable(PostCategoryConfig::CATEGORY_POST_RELATION_TBL, $categoryPost);

        // Insert image secondary:
        $imgFeatures = $data['imgFeature'];
        $imgFeaturesPost = [];
        $index = 0;
        foreach ($imgFeatures as $imgFeature) {
            $newImgFeature = [
                'post_id' => $post->id,
                'media_id' => (int)$imgFeature,
                'order' => $index
            ];
            array_push($imgFeaturesPost, $newImgFeature);
            $index++;
        }
        $this->coreDBRepository->createNewRecordOfTable(MediaPostConfig::GALLERY_POST_TBL, $imgFeaturesPost);

        $wherePostTypes = [
            ['type', '=', ReferencesConfig::POST_TYPE],
        ];
        $postTypes = $this->referenceRepository->getReferenceFromAttribute(ReferencesConfig::REFERENCE_TBL, $wherePostTypes);
        $galleryPostType = $postTypes->where('value', '=', ReferencesConfig::GALLERY_POST_TYPE)->first();
        $slidePostType = $postTypes->where('value', '=', ReferencesConfig::SLIDE_POST_TYPE)->first();
        $normalPostType = $postTypes->where('value', '=', ReferencesConfig::NORMAL_POST_TYPE)->first();

        switch ((int)$data['type_article']) {
            case $galleryPostType->id:
                // Insert image secondary:
                $imgSecondaries = $data['imgSecondary'];
                $imgSecondaryPost = [];
                foreach ($imgSecondaries as $imgSecondary) {
                    $newImgSecondary = [
                        'post_id' => $post->id,
                        'media_id' => (int)$imgSecondary,
                        'order' => $index
                    ];
                    array_push($imgSecondaryPost, $newImgSecondary);
                    $index++;
                }
                $this->coreDBRepository->createNewRecordOfTable(MediaPostConfig::GALLERY_POST_TBL, $imgSecondaryPost);
                break;
            case $slidePostType->id:
                // Insert image secondary:
                $imgSlides = $data['imgSlide'];
                $imgSlidePost = [];
                foreach ($imgSlides as $imgSlide) {
                    $newImgSlide = [
                        'post_id' => $post->id,
                        'media_id' => (int)$imgSlide,
                        'order' => $index
                    ];
                    array_push($imgSlidePost, $newImgSlide);
                    $index++;
                }
                $this->coreDBRepository->createNewRecordOfTable(MediaPostConfig::GALLERY_POST_TBL, $imgSlidePost);
                break;
        }
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
        $post = $this->repository->getDetailPost($postCategoryId);
        $wherePostTypes = [
            ['type', '=', ReferencesConfig::POST_TYPE],
        ];
        $postTypes = $this->referenceRepository->getReferenceFromAttribute(ReferencesConfig::REFERENCE_TBL, $wherePostTypes);
        $galleryPostType = $postTypes->where('value', '=', ReferencesConfig::GALLERY_POST_TYPE)->first();
        $slidePostType = $postTypes->where('value', '=', ReferencesConfig::SLIDE_POST_TYPE)->first();
        $normalPostType = $postTypes->where('value', '=', ReferencesConfig::NORMAL_POST_TYPE)->first();
        $post->image_feature = reset($post->media);
        switch ((int)$post->type_article) {
            case $galleryPostType->id:
                // get image secondary:
                $post->image_secondary = array_slice($post->media, 1);
                break;
            case $slidePostType->id:
                // get image slide:
                $post->image_slide = array_slice($post->media, 1);
                break;
        }
        return $post;
    }

    /**
     * @param $postCategoryId
     * @param $data
     * @return mixed
     */
    public function updatePost($postCategoryId, $data) {
        unset($data['id']);
        return $this->repository->updatePost($postCategoryId, $data);
    }
}