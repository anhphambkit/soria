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
     * @return mixed
     */
    public function createNewAddressBook(array $data) {
        return $this->addressBookRepository->createNewAddressBook($data);
    }
}