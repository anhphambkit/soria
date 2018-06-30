<?php
namespace Packages\Frontend\Services\Eloquent;
use Packages\Core\Traits\Services\PackageServicesTrait;
use Packages\Frontend\Entities\Frontend;
use Packages\Frontend\Custom\Repositories\FrontendRepositories;
use Packages\Frontend\Services\FrontendServices;

class EloquentFrontendServices implements FrontendServices {
    use PackageServicesTrait;

    private $repositories;
    public function __construct(FrontendRepositories $repositories)
    {
        $this->repositories = $repositories;
        $this->repositories->setModel(new Frontend());
    }
}