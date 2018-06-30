<?php
namespace Packages\Core\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Packages\Core\Response\Response;
use Illuminate\Support\Str;

class CoreFormRequest extends FormRequest
{
    public function failedValidation(Validator $validator)
    {
        $json = [
            'status'    => Response::STATUS_VALIDATION_ERROR,
            'message'   => 'Validation error.',
            'data'      => $validator->errors()->getMessages(),
        ];

        $response = new JsonResponse($json, 400 );
        throw (new ValidationException($validator, $response))->status(400);
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