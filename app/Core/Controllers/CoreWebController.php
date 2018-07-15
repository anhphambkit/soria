<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/15/18
 * Time: 10:51
 */

namespace app\Core\Controllers;

use Illuminate\Routing\Controller;

class CoreWebController extends Controller
{
    const STATUS_SUCCESS = 0;
    const STATUS_VALIDATION_ERROR = 1;
    const STATUS_NOT_FOUND_ERROR = 2; // Not found something
    const STATUS_UNEXPECTED_ERROR = 99;

    protected function removeNullParams()
    {
        $all = request()->all();
        foreach ($all as $param => $value) {
            if (empty($value)) {
                unset(request()[$param]);
            }
        }

    }

    protected function response($data, $status = 0, $message = null)
    {
        $httpCode = 200;
        if ($status == self::STATUS_SUCCESS) {
            $message = 'Success';
        } elseif ($status == self::STATUS_VALIDATION_ERROR) {
            $message = 'Validation error';
            $httpCode = 433;
        } elseif ($status == self::STATUS_NOT_FOUND_ERROR) {
            $message = 'Not found';
            $httpCode = 403;
        } elseif ($status == self::STATUS_UNEXPECTED_ERROR) {
            $message = 'Unexpected error';
            $httpCode = 500;
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $httpCode)->send();
    }
}
