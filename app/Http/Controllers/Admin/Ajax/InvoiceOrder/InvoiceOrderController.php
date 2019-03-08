<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 3/8/19
 * Time: 08:35
 */

namespace App\Http\Controllers\Admin\Ajax\InvoiceOrder;


use App\Core\Controllers\CoreAjaxController;
use App\Packages\Shop\Services\InvoiceOrderServices;

class InvoiceOrderController extends CoreAjaxController
{
    protected $invoiceOrderServices;

    public function __construct(InvoiceOrderServices $invoiceOrderServices)
    {
        $this->invoiceOrderServices = $invoiceOrderServices;
    }

    public function getAllOrders() {
        $result = $this->invoiceOrderServices->getListOrdersToManage();
        return $this->response($result);
    }
}

