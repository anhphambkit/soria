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
     * @param int $userId
     * @param bool $isGuest
     * @return mixed
     */
    public function createNewAddressBook(array $data, int $userId, bool $isGuest);

    /**
     * @param int $userId
     * @param bool $isGuest
     * @return mixed
     */
    public function getAddressBooks(int $userId, bool $isGuest);

    /**
     * @param int $addressId
     * @param int $userId
     * @param bool $isGuest
     * @return mixed
     */
    public function deleteAddressShipping(int $addressId, int $userId, bool $isGuest = true);

    /**
     * @param array $data
     * @param int $userId
     * @param bool $isGuest
     * @return mixed
     */
    public function updateAddressBook(array $data, int $userId, bool $isGuest);

    /**
     * @param int $addressId
     * @param int $userId
     * @param bool $isGuest
     * @return mixed
     */
    public function getDetailAddressShipping(int $addressId, int $userId, bool $isGuest = true);

    /**
     * @param int $addressId
     * @param int $userId
     * @param bool $isGuest
     * @return mixed
     */
    public function shipToThisAddress(int $addressId, int $userId, bool $isGuest = true);

    /**
     * @param int $userId
     * @param bool $isGuest
     * @return mixed
     */
    public function getDetailAddressShippingSelected(int $userId, bool $isGuest = true);
}