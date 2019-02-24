<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 12:40
 */

namespace App\Packages\Shop\Repositories;


interface InvoiceOrderRepository
{
    /**
     * @param array $data
     * @return mixed
     */
    public function createNewInvoiceOrder(array $data);
}