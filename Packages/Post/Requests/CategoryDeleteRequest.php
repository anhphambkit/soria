<?php
namespace Packages\Post\Requests;
use Packages\Core\Requests\CoreFormRequest;
use Packages\User\Custom\Services\RoleServices;

class CategoryDeleteRequest extends CoreFormRequest
{
    public function rules()
    {
        return [
            'id'  => 'required|exists:post_categories',
        ];
    }
}