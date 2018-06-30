<?php
namespace Packages\Post\Requests;
use Packages\Core\Requests\CoreFormRequest;

class PostDeleteRequest extends CoreFormRequest
{
    public function rules()
    {
        return [
            'id'  => 'required|exists:posts',
        ];
    }

}