<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/1/18
 * Time: 22:06
 */

namespace App\Core\Controllers;

use App\Core\Response\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;

class CoreAjaxController extends Controller
{
    protected function removeNullParams(){
        $all = request()->all();
        foreach($all as $param => $value){
            if(empty($value)){
                unset(request()[$param]);
            }
        }

    }

    protected function response($data, $status = 0, $message = null){
        $httpCode = 200;
        if($status == Response::STATUS_SUCCESS){
            $message = !empty($message) ? $message : 'Success';
        } elseif ($status == Response::STATUS_VALIDATION_ERROR){
            $message = !empty($message) ? $message : 'Validation error';
            $httpCode = 433;
        }  elseif ($status == Response::STATUS_NOT_FOUND_ERROR){
            $message = !empty($message) ? $message : 'Not found';
            $httpCode = 403;
        } elseif ($status == Response::STATUS_UNEXPECTED_ERROR){
            $message = !empty($message) ? $message : 'Unexpected error';
            $httpCode = 500;
        }

        return response()->json([
            'status'    => $status,
            'message'   => $message,
            'data'      => $data,
        ], $httpCode);
    }
}