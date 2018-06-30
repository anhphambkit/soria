<?php
namespace Packages\Post\Repositories\Eloquent;


use Packages\Core\Traits\Repositories\PackageRepositoriesTrait;
use Packages\Post\Repositories\PostRepositories;

class EloquentPostRepositories implements PostRepositories
{
    use PackageRepositoriesTrait;
}