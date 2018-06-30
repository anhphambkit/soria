<?php
namespace Packages\Order\Repositories\Eloquent;


use Packages\Core\Traits\Repositories\PackageRepositoriesTrait;
use Packages\Order\Repositories\OrderRepositories;

class EloquentOrderRepositories implements OrderRepositories
{
    use PackageRepositoriesTrait;
}