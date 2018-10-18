<?php
namespace App\Core\Exceptions;

use Exception;
use App\Core\Response\Response;

class CoreExceptionHandler extends Exception {

    protected function response($data, $status = 0, $message = null){
        $httpCode = 200;
        if($status == Response::STATUS_SUCCESS){
            $message = 'Success';
        } elseif ($status == Response::STATUS_VALIDATION_ERROR){
            $message = 'Validation error';
            $httpCode = 433;
        }  elseif ($status == Response::STATUS_NOT_FOUND_ERROR){
            $message = 'Not found';
            $httpCode = 403;
        } elseif ($status == Response::STATUS_UNEXPECTED_ERROR){
            $message = 'Unexpected error';
            $httpCode = 500;
        }
        return response()->json([
            'status'    => $status,
            'message'   => $message,
            'data'      => $data,
        ], $httpCode)->send();
    }
}