<?php
/**
 * Manufacturer repository implemented
 */
namespace Packages\Product\Repositories\Eloquent;
use Packages\Product\Repositories\ManufacturerRepositories;
use Packages\Core\Traits\Repositories\PackageRepositoriesTrait;

class EloquentManufacturerRepositories implements ManufacturerRepositories {
    use PackageRepositoriesTrait;

    public function __construct() {
    }
}