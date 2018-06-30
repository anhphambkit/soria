<?php
namespace Packages\Post\Services\Eloquent;
use Illuminate\Support\Facades\DB;
use Packages\Core\Services\UtilServices;
use Packages\Core\Traits\Services\PackageServicesTrait;
use Packages\Post\Custom\Repositories\CategoryRepositories;
use Packages\Post\Custom\Services\CategoryServices;
use Packages\Post\Entities\Category;

class EloquentCategoryServices implements CategoryServices  {
    use PackageServicesTrait;

    private $repositories;
    public function __construct(CategoryRepositories $repositories)
    {
        $this->repositories = $repositories;
        $this->repositories->setModel(new Category());
    }

    /**
     * Create/Update category
     * @param $data
     * @param int|null $id: id = null will create new
     * @return mixed
     */
    public function crud($data, $id = null)
    {
        // Force update/create parent_id to null if it's empty
        if(empty($data['parent_id'])){
            $data['parent_id'] = null;
        }

        if(is_null($id)){
            // Create unique slug
            $utilServices = app()->make(UtilServices::class);
            if(empty($data['slug']) || strlen(trim($data['slug'])) == 0 ){
                $data['slug'] = $utilServices->generateSlug($data['name']); // Just generate default slug
            }
            $data['slug'] = $this->repositories->getSlug($data['slug']);
            return $this->repositories->create($data);
        }

        return $this->repositories->update($id, $data);
    }

    /**
     * Delete category
     * @param $id
     * @return bool
     */
    public function delete($id){
        DB::beginTransaction();
        try {
            $result = $this->repositories->delete($id);
            DB::commit();
        } catch (\Exception $e){
            DB::rollback();
            return false;
        }

        return $result;
    }
}