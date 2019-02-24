<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/20/19
 * Time: 08:30
 */

namespace App\Packages\Shop\Services\Implement;


use App\Packages\Shop\Repositories\AddressBookRepository;
use App\Packages\Shop\Services\AddressBookServices;
use Carbon\Carbon;

class ImplementAddressBookServices implements AddressBookServices
{
    private $addressBookRepository;

    /**
     * ImplementAddressBookServices constructor.
     * @param AddressBookRepository $addressBookRepository
     */
    public function __construct(AddressBookRepository $addressBookRepository)
    {
        $this->addressBookRepository = $addressBookRepository;
    }

    /**
     * @param array $data
     * @param int $userId
     * @param bool $isGuest
     * @return mixed
     * @throws \Exception
     */
    public function createNewAddressBook(array $data, int $userId, bool $isGuest) {
        $now = Carbon::now();
        $data['user_id'] = $userId;
        $data['is_guest'] = $isGuest;
        $data['created_at'] = $now;
        $data['updated_at'] = $now;
        try {
            return $this->addressBookRepository->createNewAddressBook($data);
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int $userId
     * @param bool $isGuest
     * @return mixed
     * @throws \Exception
     */
    public function getAddressBooks(int $userId, bool $isGuest) {
        try {
            return $this->addressBookRepository->getAddressBooks($userId, $isGuest);
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int $addressId
     * @param int $userId
     * @param bool $isGuest
     * @return mixed
     * @throws \Exception
     */
    public function deleteAddressShipping(int $addressId, int $userId, bool $isGuest = true)
    {
        // TODO: Implement deleteAddressShipping() method.
        try {
            return $this->addressBookRepository->deleteAddressShipping($addressId, $userId, $isGuest);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param array $data
     * @param int $userId
     * @param bool $isGuest
     * @return mixed
     * @throws \Exception
     */
    public function updateAddressBook(array $data, int $userId, bool $isGuest) {
        try {
            return $this->addressBookRepository->updateAddressBook($data, $userId, $isGuest);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int $addressId
     * @param int $userId
     * @param bool $isGuest
     * @return mixed
     * @throws \Exception
     */
    public function getDetailAddressShipping(int $addressId, int $userId, bool $isGuest = true) {
        try {
            return $this->addressBookRepository->getDetailAddressShipping($addressId, $userId, $isGuest);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int $addressId
     * @param int $userId
     * @param bool $isGuest
     * @return mixed
     * @throws \Exception
     */
    public function shipToThisAddress(int $addressId, int $userId, bool $isGuest = true) {
        try {
            return $this->addressBookRepository->shipToThisAddress($addressId, $userId, $isGuest);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int $userId
     * @param bool $isGuest
     * @return mixed
     * @throws \Exception
     */
    public function getDetailAddressShippingSelected(int $userId, bool $isGuest = true) {
        try {
            return $this->addressBookRepository->getDetailAddressShippingSelected($userId, $isGuest);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}