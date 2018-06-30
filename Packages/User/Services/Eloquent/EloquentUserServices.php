<?php
namespace Packages\User\Services\Eloquent;
use Packages\Core\Traits\Services\PackageServicesTrait;
use Packages\User\Custom\Repositories\UserRepositories;
use Packages\User\Custom\Services\UserServices;
use Packages\User\Entities\User;

class EloquentUserServices implements UserServices {
    use PackageServicesTrait;

    private $repositories;
    public function __construct(UserRepositories $repositories)
    {
        $this->repositories = $repositories;
        $this->repositories->setModel(new User());
    }

    /**
     * Update new data to model
     * @param $id
     * @param array $data : List new values to update
     * @return boolean
     */
    public function update($id, $data){
        $updated = $this->repositories->update($id, $data);
        if(!empty($data['password'])){
            $this->repositories->get($id)->fill([
                'password' => Hash::make($data['password'])
            ])->save();
        }
        return $updated;
    }

    /**
     * Do login
     * @param $email
     * @param $password
     * @param bool $remember
     * @return mixed
     */
    public function doLogin($email, $password, $remember = false)
    {
//        $this->repositories->
    }

    /**
     * Do logout
     * @return mixed
     */
    public function doLogout()
    {
        // TODO: Implement doLogout() method.
    }
}