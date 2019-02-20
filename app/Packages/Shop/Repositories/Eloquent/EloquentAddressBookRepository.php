<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/20/19
 * Time: 08:31
 */

namespace App\Packages\Shop\Repositories\Eloquent;


use App\Packages\Admin\Shop\Entities\AddressBook;
use App\Packages\Shop\Repositories\AddressBookRepository;

class EloquentAddressBookRepository implements AddressBookRepository
{
    private $addressBookModel;

    /**
     * EloquentAddressBookRepository constructor.
     * @param AddressBook $addressBookModel
     */
    public function __construct(AddressBook $addressBookModel)
    {
        $this->addressBookModel = $addressBookModel;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createNewAddressBook(array $data) {
        return $this->addressBookModel->insertGetId($data);
    }
}