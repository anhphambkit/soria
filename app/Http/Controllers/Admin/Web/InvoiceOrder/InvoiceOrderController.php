<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 3/8/19
 * Time: 08:16
 */

namespace App\Http\Controllers\Admin\Web\InvoiceOrder;


use App\Http\Controllers\SystemGeneral\Web\BaseAdminController;
use App\Packages\Shop\Services\InvoiceOrderServices;

class InvoiceOrderController extends BaseAdminController
{
    protected $invoiceOrderServices;

    public function __construct(InvoiceOrderServices $invoiceOrderServices) {
        parent::__construct();
        $this->invoiceOrderServices = $invoiceOrderServices;
    }

    /**
     * List Products.
     *
     * @return
     */
    public function index() {
        return view(config('setting.theme.system') . '.pages.invoice-order.manage-orders');
    }

    /**
     * New Product.
     *
     * @return
     */
    public function newProduct() {

    }

    /**
     * Edit Product.
     *
     * @return
     */
    public function editProduct() {

    }
}