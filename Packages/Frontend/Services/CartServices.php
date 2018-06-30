<?php
/**
 * The interface of cart services
 */
namespace Packages\Frontend\Services;

interface CartServices {
    /*
     * Add product to cart
     */
    public function add($id, $qty, $unique = []);

    /**
     * Remove product in cart
     * @param $rowId: ID of row in cart
     * @return mixed
     */
    public function remove($rowId);

    /**
     * Get item in cart
     * @param $rowId
     * @return mixed
     */
    public function get($rowId);

    /**
     * Update item in cart
     * @param $rowId
     * @param array $data
     * @return mixed
     */
    public function update($rowId, $data);

    /**
     * Get all products in cart
     * @return mixed
     */
    public function all();

    /**
     * Empty cart
     * @return mixed
     */
    public function destroy();

    /**
     * Sum total
     * @return mixed
     */
    public function total();
    public function tax();

    public function subtotal();

    public function search();

    public function count();

    /**
     * Checkout cart request
     * @param $data
     * @return mixed
     */
    public function checkout($data);
}