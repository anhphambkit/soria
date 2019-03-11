<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/15/18
 * Time: 11:54
 */

namespace App\Packages\SystemGeneral\Services;

interface MediaServices {

    /**
     * @param $file
     * @param $rootPath
     * @param int $compressImage
     * @return mixed
     */
    public function storeMedia($file, $rootPath, $compressImage = 80);

    /**
     * Get type by extension
     * @param  string $ext Specific extension
     * @return string      Type
     */
    public function getType($ext);

    /**
     * Get all extensions
     * @return array Extensions of all file types
     */
    public function allExtensions();

    /**
     * Get directory for the specific user
     * @return string Specific user directory
     */
    public function getUserDir();
}