<?php
namespace Packages\User\Services;
use Illuminate\Database\Eloquent\Model;

interface UserServices {
    /**
     * Do login
     * @param $email
     * @param $password
     * @param bool $remember
     * @return mixed
     */
    public function doLogin($email, $password, $remember = false);

    /**
     * Do logout
     * @return mixed
     */
    public function doLogout();

    /**
     * Get model by Id
     * @param $id
     * @return Model | null
     */
    public function get($id);

    /**
     * Delete model by Id
     * @param $id
     * @return boolean
     */
    public function delete($id);

    /**
     * Update new data to model
     * @param $id
     * @param array $data : List new values to update
     * @return boolean
     */
    public function update($id, $data);

    /**
     * Get all
     * @return array
     */
    public function all();
}