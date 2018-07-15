<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/1/18
 * Time: 22:07
 */
namespace app\Core\Response;

interface Response
{
    const STATUS_SUCCESS = 0;
    const STATUS_VALIDATION_ERROR = 1;
    const STATUS_NOT_FOUND_ERROR = 2; // Not found something
    const STATUS_UNEXPECTED_ERROR = 99;

}