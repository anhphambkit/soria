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
use App\Packages\Shop\Services\ProductsInOrderServices;
use App\Packages\SystemGeneral\Services\GeneralSettingServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceOrderController extends BaseAdminController
{
    protected $invoiceOrderServices;
    protected $productsInOrderServices;

    public function __construct(InvoiceOrderServices $invoiceOrderServices, GeneralSettingServices $generalSettingServices,
                                ProductsInOrderServices $productsInOrderServices
    ) {
        parent::__construct($generalSettingServices);
        $this->invoiceOrderServices = $invoiceOrderServices;
        $this->productsInOrderServices = $productsInOrderServices;
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
    public function detailInvoiceOrder(Request $request) {
        $orderId = (int)$request->route('id');
        $detailOrder = $this->invoiceOrderServices->getDetailInvoiceOrder($orderId);
        $orderProducts = $this->productsInOrderServices->getAllProductsInOrder($orderId);
        return view(config('setting.theme.system') . '.pages.invoice-order.detail-invoice-order', compact('detailOrder', 'orderProducts'));
    }

    /**
     * Edit Product.
     *
     * @return
     */
    public function editProduct() {

    }
}