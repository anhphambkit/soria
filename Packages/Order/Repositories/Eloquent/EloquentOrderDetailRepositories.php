<?php
/**
 * OrderDetail repository implemented
 */
namespace Packages\Order\Repositories\Eloquent;
use Packages\Order\Repositories\OrderDetailRepositories;
use Packages\Core\Traits\Repositories\PackageRepositoriesTrait;

class EloquentOrderDetailRepositories implements OrderDetailRepositories {
    use PackageRepositoriesTrait;

    public function __construct() {
    }
}