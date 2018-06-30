<?php
namespace Packages\Order\Services;

interface OrderServices {
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
     * Quick create/update
     * @param $data
     * @param null $id
     * @return mixed
     */
    public function crud($data, $id = null);



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
     * @return Model
     */
    public function create($data);

    /**
     * List all
     * @return array
     */
    public function all();

    /**
     * Simple filter model data
     * @param array $data: ['is_active' => true, 'name' => 'ABC']
     */
    public function filter($data);

    /**
     * @param array $products : [ 'product_id' , 'quantity' ]
     * @param boolean $useDefaultBusiness: Apply default business for tax + fee ship
     * @param $tax: percent tax
     * @param int $feeShip
     * @return array
     */
    public function calBilling($products, $useDefaultBusiness = false, $tax = 0 , $feeShip = 0);
}