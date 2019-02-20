<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/20/19
 * Time: 08:31
 */

namespace App\Packages\Shop\Repositories;


interface AddressBookRepository
{
    /**
     * @param array $data
     * @return mixed
     */
    public function createNewAddressBook(array $data);
}