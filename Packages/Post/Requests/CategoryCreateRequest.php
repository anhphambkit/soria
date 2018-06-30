<?php
namespace Packages\Post\Requests;
use Packages\Core\Requests\CoreFormRequest;

class CategoryCreateRequest extends CoreFormRequest
{
    public function rules()
    {
        return [
            'name'  => 'required|min:2|unique:post_categories,name',
            'parent_id'  => 'exists:post_categories,id',
            'slug'  => 'unique:post_categories,slug',
        ];
    }

}