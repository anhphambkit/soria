<?php
namespace App\Core\Exceptions;

use Illuminate\Validation\ValidationException as Exception;
use App\Core\Requests\FormatMessageTrait;

class ValidationException extends Exception {

    use FormatMessageTrait;
    /**
     * Get all of the validation error messages.
     *
     * @return array
     */
    public function errors()
    {
        return $this->customErrors($this->validator->errors()->messages());
    }
    
}