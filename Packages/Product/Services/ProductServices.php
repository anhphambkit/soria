<?php
namespace Packages\Product\Services;

use Illuminate\Database\Eloquent\Collection;
use Packages\Product\Entities\Product;

interface ProductServices {
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
     * Create/Update product
     * @param array $data
     * @param int/null $id: $id = null will create and $id != null will update
     * @return Product|null
     */
    public function crud($data, $id = null);

    /**
     * Simple filter model data
     * @param array $data: ['is_active' => true, 'name' => 'ABC']
     */
    public function filter($data);

    /**
     * The final price which customer will buy product
     * @param Product $product
     * @return int
     */
    public function finalPrice(Product $product);

    /**
     * Get related products
     * @param Product $product
     * @param int $limit
     * @return Collection
     */
    public function getRelatedProduct(Product $product, $limit = 5);
}