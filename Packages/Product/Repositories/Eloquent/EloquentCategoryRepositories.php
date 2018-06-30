<?php
namespace Packages\Product\Repositories\Eloquent;
use Packages\Core\Traits\Repositories\PackageRepositoriesTrait;
use Packages\Product\Repositories\CategoryRepositories;

class EloquentCategoryRepositories implements CategoryRepositories
{
    use PackageRepositoriesTrait;

    /**
     * Get slug if it's unique
     * @param String $slug (Original slug)
     * @return String slug if it's unique or new generated slug;
     */
    public function getSlug($slug)
    {
        $index = 0;
        do {
            $newSlug = $slug. ($index == 0 ? '' : $index);
            $isExistSlug = $this->getModel()->where('slug', $newSlug)->first();
            $index++;
        } while (!empty($isExistSlug));

        return $newSlug;
    }
}