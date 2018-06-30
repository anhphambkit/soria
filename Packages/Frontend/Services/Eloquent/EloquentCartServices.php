<?php
namespace Packages\Frontend\Services\Eloquent;
use Gloudemans\Shoppingcart\Facades\Cart;
use Packages\Frontend\Services\CartServices;
use Packages\Order\Custom\Services\OrderServices;
use Packages\Product\Custom\Services\ProductServices;
use Packages\Product\Entities\Product;

class EloquentCartServices implements CartServices {
    private $prodServices;
    private $orderServices;
    public function __construct(ProductServices $productServices, OrderServices $orderServices)
    {
        $this->prodServices = $productServices;
        $this->orderServices = $orderServices;
    }

    public function add($id, $qty, $unique = [])
    {
        $p = $this->prodServices->get($id);
        return Cart::add($id, $p->name, $qty, $p->sale_price, $unique);
    }

    /**
     * Remove product in cart
     * @param $rowId : ID of row in cart
     * @return mixed
     */
    public function remove($rowId)
    {
        return Cart::remove($rowId);
    }

    /**
     * Get item in cart
     * @param $rowId
     * @return mixed
     */
    public function get($rowId)
    {
        return Cart::get($rowId);
    }

    /**
     * Get all products in cart
     * @return mixed
     */
    public function all()
    {
        return Cart::content();
    }

    /**
     * Empty cart
     * @return mixed
     */
    public function destroy()
    {
        return Cart::destroy();
    }

    /**
     * Sum total
     * @return mixed
     */
    public function total()
    {
        return Cart::total();
    }

    public function subtotal()
    {
        return Cart::subtotal();
    }

    public function search()
    {
        return Cart::search();
    }

    public function count()
    {
        return Cart::count();
    }

    public function tax()
    {
        return Cart::tax();
    }

    /**
     * Update item in cart
     * @param $rowId
     * @param array $data
     * @return mixed
     */
    public function update($rowId, $data)
    {
        return Cart::update($rowId, $data);
    }

    /**
     * Checkout cart request
     * @param $data
     * @return mixed
     */
    public function checkout($data)
    {
        $billCalculation = $this->orderServices->calBilling($data['products'], true);
        $data = array_merge($data, [
            'tax'   => $billCalculation['tax'],
            'tax_value'   => $billCalculation['taxValue'],
            'total'   => $billCalculation['total'],
            'fee_ship'   => $billCalculation['feeShip'],
        ]);
        $createOrder = $this->orderServices->crud($data);
        $this->destroy();
        return $createOrder;
    }
}