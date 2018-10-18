<?php
namespace App\Core\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;
use App\Core\Exceptions\ValidationException;
//use Illuminate\Validation\ValidationException;
use App\Core\Response\Response;
use Illuminate\Support\Str;
use App\Core\Requests\FormatMessageTrait;
use Illuminate\Foundation\Http\FormRequest;

class CoreFormRequest extends FormRequest
{
    use FormatMessageTrait;

    public function failedValidation(Validator $validator)
    {
        if ($this->expectsJson()) {
            
            $json = [
                'status'    => Response::STATUS_VALIDATION_ERROR,
                'message'   => 'Validation error.',
                'data'      => $this->customErrors($validator->errors()->getMessages()),
            ];

            $response = new JsonResponse($json, 400 );
            throw (new ValidationException($validator, $response))->status(400);
        }

        throw (new ValidationException($validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());

        // $response = new JsonResponse($json, 400 );
        // throw (new ValidationException($validator, $response))->status(400);
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        if($validator->passes()){
            $this->afterPasses();
        }
    }

    /**
     * Format data after passed
     */
    protected function afterPasses(){}

    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}