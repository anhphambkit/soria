<?php
/**
 * The interface of manufacturer services
 */
namespace Packages\Product\Services;

interface ManufacturerServices {
/**
     * @return Model
     */
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
     * @return Model ID
     */
    public function create($data);

    /**
     * Get all
     * @return array
     */
    public function all();

    /**
     * Quick update/create
     * @param $data
     * @param null $id
     * @return mixed
     */
    public function crud($data, $id= null);

    /**
     * Simple filter model data
     * @param array $data: ['is_active' => true, 'name' => 'ABC']
     */
    public function filter($data);
}