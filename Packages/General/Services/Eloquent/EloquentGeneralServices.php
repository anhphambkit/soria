<?php
namespace Packages\General\Services\Eloquent;
use Packages\Core\Traits\Services\PackageServicesTrait;
use Packages\General\Config\GeneralConfig;
use Packages\General\Entities\General;
use Packages\General\Custom\Repositories\GeneralRepositories;
use Packages\General\Services\GeneralServices;
use Packages\System\Custom\Repositories\SystemRepositories;
use Packages\System\Entities\System;

class EloquentGeneralServices implements GeneralServices {
    use PackageServicesTrait;

    private $repositories;
    public function __construct(SystemRepositories $systemRepositories)
    {
        $this->repositories = $systemRepositories;
        $this->repositories->setModel(new System());
    }

    /**
     * Get current config
     */
    public function get(){
        $config = $this->repositories->filter(['package'  => GeneralConfig::GENERAL_SYSTEM_CONFIG_PACKAGE])->get();
        $result = [];
        foreach($config as $c){
            $result[$c->key] = $c->value;
        }
        return $result;
    }

    /**
     * @param array $data
     * @return boolean
     */
    public function update($data)
    {

        foreach($data as $key => $value){
            $this->repositories->filter(['package'  => GeneralConfig::GENERAL_SYSTEM_CONFIG_PACKAGE, 'key'  => $key ])->update(['value'  => $value]);
        }

        return true;
    }
}