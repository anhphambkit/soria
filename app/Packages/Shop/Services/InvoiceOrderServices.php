<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 12:38
 */

namespace App\Packages\Shop\Services;


interface InvoiceOrderServices
{
    /**
     * @param array $dataCheckouts
     * @param int $userId
     * @param bool $isGuest
     * @return mixed
     */
    public function createNewInvoiceOrder(array $dataCheckouts, int $userId, bool $isGuest);

    /**
     * @return mixed
     */
    public function getListOrdersToManage();

    /**
     * @param int $orderId
     * @return mixed
     */
    public function getDetailInvoiceOrder(int $orderId);

    /**
     * @param int $orderId
     * @return mixed
     */
    public function sendEmailNotifyNewOrder(int $orderId);
}