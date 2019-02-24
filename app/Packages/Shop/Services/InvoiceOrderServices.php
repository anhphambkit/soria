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
}