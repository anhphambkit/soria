<?php
/**
 * Created by PhpStorm.
 * User: minh.truong
 * Date: 3/28/18
 * Time: 2:21 PM
 */

namespace Packages\User\Repositories\Eloquent;


use Packages\Core\Traits\Repositories\PackageRepositoriesTrait;
use Packages\User\Repositories\UserRepositories;

class EloquentUserRepositories implements UserRepositories
{
    use PackageRepositoriesTrait;
}