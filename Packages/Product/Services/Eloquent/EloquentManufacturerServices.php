<?php
/**
 * Manufacturer service implemented
 */
namespace Packages\Product\Services\Eloquent;
use Illuminate\Support\Facades\DB;
use Packages\Product\Custom\Entities\Manufacturer;
use Packages\Product\Custom\Repositories\ManufacturerRepositories;
use Packages\Product\Services\ManufacturerServices;
use Packages\Core\Traits\Services\PackageServicesTrait;

class EloquentManufacturerServices implements ManufacturerServices {
    use PackageServicesTrait;

    private $repositories;
    public function __construct(ManufacturerRepositories $repositories)
    {
        $this->repositories = $repositories;
        $this->repositories->setModel(new Manufacturer());
    }

    public function get($id)
    {
        $manufacturer = $this->repositories->get($id);
        $manufacturer->logo_link = null;
        $logoLink = $manufacturer->logo()->first();
        if(!empty($logoLink)){
            $manufacturer->logo_link = asset('storage/'. $logoLink->path_org);
        }

        return $manufacturer;
    }

    /**
     * Quick update/create
     * @param $data
     * @param null $id
     * @return mixed
     */
    public function crud($data, $id = null)
    {
        if(empty($data['logo_id'])){
            $data['logo_id'] = null;
        } else {
            $data['logo_id'] = (int) $data['logo_id'];
        }

        $manufacturer = null;
        DB::beginTransaction();
        try {
            if(is_null($id)){
                $manufacturer = $this->repositories->create($data);
            } else {
                $this->repositories->update($id, $data);
            }
            DB::commit();
        } catch (\Exception $e){
            activity()->withProperties(['data'  => $data, 'msg' => 'Create/Update Manufacturer'])->log($e->getMessage());
            DB::rollback();
            return null;
        }
        return $manufacturer;
    }
}