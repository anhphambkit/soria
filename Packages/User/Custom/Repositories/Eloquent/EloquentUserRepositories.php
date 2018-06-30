<?php
namespace Packages\User\Custom\Repositories\Eloquent;

use Packages\User\Repositories\Eloquent\EloquentUserRepositories as CoreEloquentUserRepositories;

class EloquentUserRepositories extends CoreEloquentUserRepositories implements \Packages\User\Custom\Repositories\UserRepositories
{
}