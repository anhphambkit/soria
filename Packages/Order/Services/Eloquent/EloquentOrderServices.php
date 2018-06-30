<?php
namespace Packages\Order\Services\Eloquent;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Packages\Core\Traits\Services\PackageServicesTrait;
use Packages\Order\Custom\Entities\OrderDetail;
use Packages\Order\Custom\Repositories\OrderDetailRepositories;
use Packages\Order\Entities\Order;
use Packages\Order\Custom\Repositories\OrderRepositories;
use Packages\Order\Services\OrderServices;
use Packages\Product\Custom\Services\ProductServices;

class EloquentOrderServices implements OrderServices {
    use PackageServicesTrait;

    private $repositories;
    private $orderDetailRepositories;
    private $productServices;

    public function __construct(OrderRepositories $repositories, OrderDetailRepositories $orderDetailRepositories, ProductServices $productServices)
    {
        $this->repositories = $repositories;
        $this->repositories->setModel(new Order());
        $this->orderDetailRepositories = $orderDetailRepositories;
        $this->orderDetailRepositories->setModel(new OrderDetail());
        $this->productServices = $productServices;
    }

    /**
     * Create/Update order
     * @param $data
     * @param null $id
     * @return mixed
     */
    public function crud($data, $id = null){
        if(auth()->check()){
            $data['user_id'] = auth()->id();
        } else {
            $data['user_id'] = null;
        }

        $data['shipping_status'] = 'I';
        $data['payment_status'] = 'P';

        DB::beginTransaction();
        try {
            if(is_null($id)){
                $order = $this->repositories->create($data);
            } else {
                $this->repositories->update($id, $data);
                $order = $this->repositories->get($id);
            }

            // Remove all old order item, and update calculate billing information, insert new order items
            $this->orderDetailRepositories->filter(['order_id'  => $order->getKey()])->delete();
            foreach($data['products'] as $detail){
                $storeDetail = $detail;
                $p = $this->productServices->get($detail['product_id']);
                $storeDetail['order_id'] = $order->getKey();
                $storeDetail['price'] = $p->price;
                $storeDetail['sale_price'] = $p->sale_price;
                $storeDetail['total'] = $this->productServices->finalPrice($p) * (int)$storeDetail['quantity'];
                $this->orderDetailRepositories->create($storeDetail);
            }

            DB::commit();
        } catch (\Exception $e){
            activity()->withProperties(['data'  => $data, 'msg' => 'Create/Update Order'])->log($e->getMessage());
            DB::rollback();
            return null;
        }
        Cache::flush();
        return $order;
    }

    public function delete($id){
        DB::beginTransaction();
        try {

            $this->orderDetailRepositories->filter(['order_id'  => $id])->delete();
            $deleted = $this->repositories->delete($id);
            DB::commit();
        } catch (\Exception $e){
            activity()->withProperties(['data'  => $id, 'msg' => 'Delete Order'])->log($e->getMessage());
            DB::rollback();
            return null;
        }
        Cache::flush();
        return $deleted;
    }

    /**
     * @param array $products : [ 'product_id' , 'quantity' ]
     * @param boolean $useDefaultBusiness: Apply default business for tax + fee ship
     * @param $tax: percent tax
     * @param int $feeShip
     * @return array
     */
    public function calBilling($products, $useDefaultBusiness = false, $tax = 0 , $feeShip = 0){
        $subTotal = 0; // Total sale_price * quantity each products
        foreach($products as $detail){
            $p = $this->productServices->get($detail['product_id']);
            $subTotal += $this->productServices->finalPrice($p) * (int)$detail['quantity'];
        }

        $total = $subTotal;
        $taxValue = $subTotal * $tax/100;
        /**
         * Include default tax and fee ship when billing greater than limited.
         */
        if($useDefaultBusiness){
            if($subTotal >= config('order.tax-when-total-more-than')){
                $tax = config('order.tax');
                $taxValue = $subTotal * $tax/100;
                $total += $taxValue;
            } else {
                $tax = 0;
                $taxValue = 0;
            }
            if($subTotal < config('order.no-fee-ship-when-more-than')){
                $feeShip = config('order.fee-ship');
                $total += $feeShip;
            } else {
                $feeShip = 0;
            }
        } else {
            $total += $taxValue;
            $total += $feeShip;
        }

        return [
            'subTotal'  => $subTotal,
            'total'  => $total,
            'feeShip'  => $feeShip,
            'tax'  => $tax,
            'taxValue'  => $taxValue,
        ];
    }
}