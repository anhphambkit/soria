<?php
namespace Packages\Post\Requests;
use Packages\Core\Requests\CoreFormRequest;

class PostCreateRequest extends CoreFormRequest
{
    public function rules()
    {
        return [
            'title'  => 'required|min:2',
            'slug'  => 'required|unique:posts,slug',
            'status'  => 'required|in:D,P',
            'cat_id'  => 'nullable|exists:post_categories,id',
            'img_id'  => 'nullable|exists:media,id',
        ];
    }
}