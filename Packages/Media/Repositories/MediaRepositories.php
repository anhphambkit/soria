<?php
namespace Packages\Media\Repositories;


interface MediaRepositories
{
    /**
     * Create new data to model
     * @param array $data : List new values to update
     * @return boolean
     */
    public function create($data);

}