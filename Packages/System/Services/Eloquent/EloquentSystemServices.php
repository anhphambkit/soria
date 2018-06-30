<?php
namespace Packages\System\Services\Eloquent;
use Packages\Core\Traits\Services\PackageServicesTrait;
use Packages\System\Entities\System;
use Packages\System\Custom\Repositories\SystemRepositories;
use Packages\System\Services\SystemServices;

class EloquentSystemServices implements SystemServices {
    use PackageServicesTrait;

    private $repositories;
    public function __construct(SystemRepositories $repositories)
    {
        $this->repositories = $repositories;
        $this->repositories->setModel(new System());
    }
}