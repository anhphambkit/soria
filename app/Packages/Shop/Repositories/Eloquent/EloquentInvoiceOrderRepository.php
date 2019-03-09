<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 12:40
 */

namespace App\Packages\Shop\Repositories\Eloquent;


use App\Packages\Shop\Entities\InvoiceOrders;
use App\Packages\Shop\Repositories\InvoiceOrderRepository;
use App\Packages\SystemGeneral\Constants\ReferencesConfig;

class EloquentInvoiceOrderRepository implements InvoiceOrderRepository
{
    private $invoiceOrdersModel;

    /**
     * EloquentInvoiceOrderRepository constructor.
     * @param InvoiceOrders $invoiceOrdersModel
     */
    public function __construct(InvoiceOrders $invoiceOrdersModel)
    {
        $this->invoiceOrdersModel = $invoiceOrdersModel;
    }

    /**
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function createNewInvoiceOrder(array $data) {
        try {
            return $this->invoiceOrdersModel->insertGetId($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getListOrdersToManage() {
        try {
            return $this->invoiceOrdersModel->select('invoice_orders.*', 'reference.value as status_name')
                    ->leftJoin(ReferencesConfig::REFERENCE_TBL . ' as reference', 'reference.id', '=', 'invoice_orders.status')
                    ->orderBy('created_at', 'desc')->get();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int $orderId
     * @return mixed
     * @throws \Exception
     */
    public function getDetailInvoiceOrder(int $orderId) {
        try {
            return $this->invoiceOrdersModel
                ->select('invoice_orders.*', 'reference_status.value as status_name', 'reference_shipping.value as shipping', 'reference_payment.value as payment')
                ->leftJoin(ReferencesConfig::REFERENCE_TBL . ' as reference_status', 'reference_status.id', '=', 'invoice_orders.status')
                ->leftJoin(ReferencesConfig::REFERENCE_TBL . ' as reference_shipping', 'reference_shipping.id', '=', 'invoice_orders.shipping_method')
                ->leftJoin(ReferencesConfig::REFERENCE_TBL . ' as reference_payment', 'reference_payment.id', '=', 'invoice_orders.payment_method')
                ->where('invoice_orders.id', $orderId)->first();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}