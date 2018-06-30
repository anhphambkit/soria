<?php
/**
 * Banner service implemented
 */
namespace Packages\Frontend\Services\Eloquent;
use Illuminate\Support\Facades\DB;
use Packages\Frontend\Custom\Entities\Banner;
use Packages\Frontend\Custom\Repositories\BannerRepositories;
use Packages\Frontend\Services\BannerServices;
use Packages\Core\Traits\Services\PackageServicesTrait;

class EloquentBannerServices implements BannerServices {
    use PackageServicesTrait;

    private $repositories;
    public function __construct(BannerRepositories $repositories)
    {
        $this->repositories = $repositories;
        $this->repositories->setModel(new Banner());
    }

    /**
     * @param $data
     * @param null $id
     * @return bool|null
     */
    public function crud($data, $id = null){
        // Convert data
        DB::beginTransaction();
        try {
            if(is_null($id)){
                $banner = $this->repositories->create($data);
            } else {
                $this->repositories->update($id, $data);
                $banner = $this->repositories->get($id);
            }

            if(!empty($data['sections'])){
                $this->repositories->attachImagesToBanner($data['sections'], $banner->getKey());
            } else {
                $this->repositories->attachImagesToBanner([], $banner->getKey());
            }

            DB::commit();
        } catch (\Exception $e){
            activity()->withProperties(['data'  => $data, 'msg' => 'Create/Update Banner Config from Admin Frontend'])->log($e->getMessage());
            DB::rollback();
            return null;
        }

        return $banner;
    }

    /**
     * @param $id
     * @return bool
     */

    public function delete($id){
        DB::beginTransaction();
        try {
            $this->repositories->attachImagesToBanner([], $id);
            $this->repositories->delete($id);
            DB::commit();
        } catch (\Exception $e){
            activity()->withProperties(['data'  => $id, 'msg' => 'Remove Banner Config from Admin Frontend'])->log($e->getMessage());
            DB::rollback();
            return false;
        }
        return true;
    }
}