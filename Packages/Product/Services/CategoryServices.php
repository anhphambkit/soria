<?php
namespace Packages\Product\Services;

interface CategoryServices {

    public function getModel();

    /**
     * @param Model $model
     */
    public function setModel($model);
    /**
     * Get model by Id
     * @param $id
     * @return Model | null
     */
    public function get($id);

    /**
     * Delete model by Id
     * @param $id
     * @return boolean
     */
    public function delete($id);

    /**
     * Update new data to model
     * @param $id
     * @param array $data : List new values to update
     * @return boolean
     */
    public function update($id, $data);

    /**
     * Create new data to model
     * @param array $data : List new values to update
     * @return string ID
     */
    public function create($data);

    /**
     * Get all
     * @return array
     */
    public function all();

    /**
     * Create/Update category
     * @param $data
     * @param int|null $id: id = null will create new
     * @return mixed
     */
    public function crud($data, $id = null);
}