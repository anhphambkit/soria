<?php
namespace Packages\Frontend\Requests;
use Packages\Core\Requests\CoreFormRequest;

class BannerCreateRequest extends CoreFormRequest
{
    public function rules()
    {
        return [
            'name'  => 'required|min:2|unique:product_banners,name',
            'slug'  => 'required|min:2|unique:product_banners,slug',
            'type'  => 'in:S,M',
            'img_id'  => 'nullable|exists:media,id',
            'sections'  => 'nullable|array',
            'sections.*.title'  => 'nullable|min:2',
            'sections.*.media_id'  => 'nullable|exists:media,id',
        ];
    }

    public function authorize()
    {
        return true;
    }

}