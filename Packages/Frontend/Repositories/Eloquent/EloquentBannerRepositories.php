<?php
/**
 * Banner repository implemented
 */
namespace Packages\Frontend\Repositories\Eloquent;
use Illuminate\Support\Facades\DB;
use Packages\Frontend\Repositories\BannerRepositories;
use Packages\Core\Traits\Repositories\PackageRepositoriesTrait;

class EloquentBannerRepositories implements BannerRepositories {
    use PackageRepositoriesTrait;

    private $tblBannerImages = 'product_banner_images';
    public function __construct() {
    }

    /**
     * Attach multiple images to banner
     * @param $images: [ { title, link, desc, media_id } ]
     * @param $bannerId
     * @return boolean
     */
    public function attachImagesToBanner($images, $bannerId)
    {
        DB::table($this->tblBannerImages)->where('banner_id', $bannerId)->delete();
        // Add categories
        foreach($images as $img){
            $img['banner_id'] = $bannerId;
            DB::table($this->tblBannerImages)->insert($img);
        }

        return true;
    }
}