<?php
namespace Packages\Media\Services;

use Illuminate\Http\Request;

interface MediaServices {
    /**
     * Upload media to server
     * @param $request
     * @return mixed
     */
    public function upload(Request $request);

    /**
     * Create new data to model
     * @param array $data : List new values to update
     * @return boolean
     */
    public function create($data);

    /**
     * Delete
     * @param int $id
     * @return boolean
     */
    public function delete($id);
}