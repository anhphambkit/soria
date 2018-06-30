<?php
namespace Packages\Post\Custom\Repositories\Eloquent;

use Packages\Post\Repositories\Eloquent\EloquentPostRepositories as CoreEloquentPostRepositories;

class EloquentPostRepositories extends CoreEloquentPostRepositories implements \Packages\Post\Custom\Repositories\PostRepositories
{
}