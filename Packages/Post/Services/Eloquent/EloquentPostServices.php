<?php
namespace Packages\Post\Services\Eloquent;
use Illuminate\Support\Facades\DB;
use Packages\Core\Traits\Services\PackageServicesTrait;
use Packages\Post\Custom\Repositories\PostRepositories;
use Packages\Post\Entities\Post;
use Packages\Post\Services\PostServices;

class EloquentPostServices implements PostServices {
    use PackageServicesTrait;

    private $repositories;

    public function __construct(PostRepositories $repositories)
    {
        $this->repositories = $repositories;
        $this->repositories->setModel(new Post());
    }

    /**
     * Create/Update post
     * @param array $data
     * @param int/null $id: $id = null will create and $id != null will update
     * @return Post|null
     */
    public function crud($data, $id = null)
    {
        DB::beginTransaction();
        $post = null;
        try {
            if(is_null($id)){
                $post = $this->repositories->create($data);
            } else {
                $this->repositories->update($id, $data);
                $post = $this->repositories->get($id);
            }

            DB::commit();
        } catch (\Exception $e){
            dd($e->getMessage());
            activity()->withProperties(['data'  => $data, 'msg' => 'Create/Update Post'])->log($e->getMessage());
            DB::rollback();
            return null;
        }
        return $post;
    }

    /**
     * Delete post
     * @param $id
     * @return boolean
     */
    public function delete($id){
        DB::beginTransaction();
        try {
            $result = $this->repositories->delete($id);
            DB::commit();
        } catch (\Exception $e){
            DB::rollback();
            return null;
        }
        return $result;
    }
}