<?php
namespace Packages\Post\Requests;
use Packages\Core\Requests\CoreFormRequest;

class PostUpdateRequest extends CoreFormRequest
{
    public function rules()
    {
        $id = $this->route('id');
        return [
            'title'  => 'required|min:2',
            'slug'  => 'required|unique:posts,slug,'. $id. ',id',
            'status'  => 'required|in:D,P',
            'img_id'  => 'nullable|exists:media,id',
        ];
    }

}