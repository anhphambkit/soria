<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/28/18
 * Time: 11:25
 */

namespace App\Packages\SystemGeneral\Services;

interface HelperServices {
    /**
     * Get id from url with delimiter default = "." (get last element of delimiter)
     * Ex:
     * url: http:example.com/this-09-is.456-url-test.123 => return id = 123
     * @param string $url
     * @param string $delimiter
     * @return mixed
     */
    public function getIdFromUrl(string $url, string $delimiter = ".");
}