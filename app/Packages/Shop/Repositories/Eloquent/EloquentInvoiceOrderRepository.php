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
}