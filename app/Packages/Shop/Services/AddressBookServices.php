<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/20/19
 * Time: 08:30
 */

namespace App\Packages\Shop\Services;


interface AddressBookServices
{
    /**
     * @param array $data
     * @return mixed
     */
    public function createNewAddressBook(array $data);
}