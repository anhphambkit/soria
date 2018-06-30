<?php
namespace Packages\Frontend\Requests;
use Packages\Core\Requests\CoreFormRequest;

class BannerUpdateRequest extends CoreFormRequest
{
    public function rules()
    {
        $id = $this->route('id');
        return [
            'name'  => 'required|min:2|unique:product_banners,name,'. $id. ',id',
            'slug'  => 'required|min:2|unique:product_banners,slug,'. $id. ',id',
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