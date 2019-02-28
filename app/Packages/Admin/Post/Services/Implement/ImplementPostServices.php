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

        if (empty($data['rating']))
            $data['rating'] = rand(4,5);
        if (empty($data['view']))
            $data['view'] = rand(169, 9998);

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
                $imgSlides = $data['imgSlides'];
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
     * @param $postId
     * @return mixed
     */
    public function getDetailPost($postId) {
        // TODO: Implement getDetailPost() method.
        $post = $this->repository->getDetailPost($postId);
//        dd($post);
        $post->medias = json_decode($post->medias, true);
        $post->categories = json_decode($post->categories, true);
        $post->prev = json_decode($post->prev, true);
        $post->next = json_decode($post->next, true);
        $post = json_decode(json_encode($post), true);

        if (sizeof($post['medias']) > 0) {
            $wherePostTypes = [
                ['type', '=', ReferencesConfig::POST_TYPE],
            ];
            $postTypes = $this->referenceRepository->getReferenceFromAttribute(ReferencesConfig::REFERENCE_TBL, $wherePostTypes);
            $galleryPostType = $postTypes->where('value', '=', ReferencesConfig::GALLERY_POST_TYPE)->first();
            $slidePostType = $postTypes->where('value', '=', ReferencesConfig::SLIDE_POST_TYPE)->first();
            $normalPostType = $postTypes->where('value', '=', ReferencesConfig::NORMAL_POST_TYPE)->first();

            $post['image_feature'] = array_shift($post['medias']);
//            switch ((int)$post['type_article']) {
//                case $galleryPostType->id:
//                    // get image secondary:
//                    $post["image_secondary"] = array_pop($post['medias']);
//                    break;
//                case $slidePostType->id:
//                    // get image slide:
//                    $post["image_slide"] = array_pop($post['medias']);
//                    break;
//            }
        }

        return $post;
    }

    /**
     * @param $postCategoryId
     * @return mixed
     */
    public function getDetailPostForAdminUpdate($postCategoryId) {
        // TODO: Implement getDetailPost() method.
        $post = $this->repository->getDetailPostForAdminUpdate($postCategoryId);
        $post = collect($post);
        if (sizeof($post['medias']) > 0) {
            $wherePostTypes = [
                ['type', '=', ReferencesConfig::POST_TYPE],
            ];
            $postTypes = $this->referenceRepository->getReferenceFromAttribute(ReferencesConfig::REFERENCE_TBL, $wherePostTypes);
            $galleryPostType = $postTypes->where('value', '=', ReferencesConfig::GALLERY_POST_TYPE)->first();
            $slidePostType = $postTypes->where('value', '=', ReferencesConfig::SLIDE_POST_TYPE)->first();
            $normalPostType = $postTypes->where('value', '=', ReferencesConfig::NORMAL_POST_TYPE)->first();
            $post->put("image_feature", [$post['medias'][0]]);
            switch ((int)$post['type_article']) {
                case $galleryPostType->id:
                    // get image secondary:
                    $post->put("image_secondary", array_slice($post['medias'], 1));
                    break;
                case $slidePostType->id:
                    // get image slide:
                    $post->put("image_slide", array_slice($post['medias'], 1));
                    break;
            }

        }

        return $post;
    }

    /**
     * @param $postId
     * @param $data
     * @return mixed
     */
    public function updatePost($postId, $data) {
        $whereDelete = [
            [
                'post_id', '=',  $postId
            ]
        ];

        // Insert relation category product:
        $categories = $data['category_id'];
        $categoryPost = [];
        foreach ($categories as $category) {
            $newCategoryPost = [
                'post_id' => $postId,
                'cate_id' => (int)$category
            ];
            array_push($categoryPost, $newCategoryPost);
        }
        $this->coreDBRepository->deleteAndCreateNewRecordOfTable(PostCategoryConfig::CATEGORY_POST_RELATION_TBL, $whereDelete, $categoryPost);

        // Update media:
        // Insert image secondary:
        $imgFeatures = $data['imgFeature'];
        $imgFeaturesPost = [];
        $index = 0;
        foreach ($imgFeatures as $imgFeature) {
            $newImgFeature = [
                'post_id' => $postId,
                'media_id' => (int)$imgFeature,
                'order' => $index
            ];
            array_push($imgFeaturesPost, $newImgFeature);
            $index++;
        }
        $this->coreDBRepository->deleteAndCreateNewRecordOfTable(MediaPostConfig::GALLERY_POST_TBL, $whereDelete, $imgFeaturesPost);

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
                        'post_id' => $postId,
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
                $imgSlides = $data['imgSlides'];
                $imgSlidePost = [];
                foreach ($imgSlides as $imgSlide) {
                    $newImgSlide = [
                        'post_id' => $postId,
                        'media_id' => (int)$imgSlide,
                        'order' => $index
                    ];
                    array_push($imgSlidePost, $newImgSlide);
                    $index++;
                }
                $this->coreDBRepository->createNewRecordOfTable(MediaPostConfig::GALLERY_POST_TBL, $imgSlidePost);
                break;
        }

        unset($data['id']);
        unset($data['category_id']);
        unset($data['imgFeature']);
        unset($data['imgSlides']);
        unset($data['imgSecondary']);
        return $this->repository->updatePost($postId, $data);
    }

    /**
     * @param int|null $categoryId | if categoryId null, get all posts
     * @param boolean $isHomepage | default false
     * @return mixed
     */
    public function getAllPostsByCategory(int $categoryId = null, bool $isHomepage = false) {
        // TODO: Implement getAllPosts() method.
        return $this->repository->getAllPostsByCategory($categoryId);
    }

    /**
     * @param $dataGet
     * @param string $attributeGet
     * @return mixed
     */
    public function getNextPrevPost($dataGet, $attributeGet = "created_at") {
        return $this->repository->getNextPrevPost($dataGet);
    }

    /**
     * @param int $numberPosts
     * @return mixed
     */
    public function getNewPosts(int $numberPosts = 3) {
        return $this->repository->getNewPosts($numberPosts);
    }

    /**
     * @param int $numberPosts
     * @return mixed
     */
    public function getRandomPosts(int $numberPosts = 3) {
        return $this->repository->getRandomPosts($numberPosts);
    }
}