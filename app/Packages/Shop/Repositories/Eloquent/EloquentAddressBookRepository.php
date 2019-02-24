<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/20/19
 * Time: 08:31
 */

namespace App\Packages\Shop\Repositories\Eloquent;


use App\Packages\Admin\Shop\Entities\AddressBook;
use App\Packages\Shop\Entities\AddressBookView;
use App\Packages\Shop\Repositories\AddressBookRepository;
use Illuminate\Support\Facades\DB;

class EloquentAddressBookRepository implements AddressBookRepository
{
    private $addressBookModel;
    private $addressBookView;

    /**
     * EloquentAddressBookRepository constructor.
     * @param AddressBook $addressBookModel
     * @param AddressBookView $addressBookView
     */
    public function __construct(AddressBook $addressBookModel, AddressBookView $addressBookView)
    {
        $this->addressBookModel = $addressBookModel;
        $this->addressBookView = $addressBookView;
    }

    /**
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function createNewAddressBook(array $data) {
        try {
            return DB::transaction(function () use ($data) {
                if ($data['is_default'])
                    $this->addressBookModel
                        ->where('user_id', $data['user_id'])
                        ->where('is_guest', $data['is_guest'])
                        ->update([
                            'is_default' => false
                        ]);
                return $this->addressBookModel->insertGetId($data);
            }, 3);
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
            return $this->addressBookView
                ->select('*')
                ->where('user_id', $userId)
                ->where('is_guest', $isGuest)
                ->orderBy('is_default', 'desc')
                ->get();
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
    public function deleteAddressShipping(int $addressId, int $userId, bool $isGuest = true){
        try {
            $numberAddressBooks = $this->addressBookModel
                                    ->select('*')
                                    ->where('user_id', $userId)
                                    ->where('is_guest', $isGuest)
                                    ->where('id', $addressId)
                                    ->count();
            if ($numberAddressBooks > 1) {
                return $this->addressBookModel
                    ->select('*')
                    ->where('user_id', $userId)
                    ->where('is_guest', $isGuest)
                    ->where('id', $addressId)
                    ->delete();
            }
            return true;
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
            return DB::transaction(function () use ($data, $userId, $isGuest) {
                if ($data['is_default']) // Unset default other address book
                    $this->addressBookModel
                        ->where('user_id', $data['user_id'])
                        ->where('is_guest', $data['is_guest'])
                        ->update([
                            'is_default' => false
                        ]);

                return $this->addressBookModel
                    ->select('*')
                    ->where('user_id', $userId)
                    ->where('is_guest', $isGuest)
                    ->where('id', $data['id'])
                    ->update($data);
            }, 3);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}