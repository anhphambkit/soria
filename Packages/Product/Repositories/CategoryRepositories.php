<?php
namespace Packages\Product\Repositories;


interface CategoryRepositories
{
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
     * Get new slug if it's unique
     * @param String $slug (original slug)
     * @return String slug if it's unique or new generated slug;
     */
    public function getSlug($slug);

    /**
     * Simple filter model data
     * @param array $data: ['is_active' => true, 'name' => 'ABC']
     */
    public function filter($data);

}