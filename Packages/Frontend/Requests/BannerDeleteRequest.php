<?php
namespace Packages\Frontend\Requests;
use Packages\Core\Requests\CoreFormRequest;

class BannerDeleteRequest extends CoreFormRequest
{
    public function rules()
    {
        return [
            'id'  => 'required|exists:product_banners,id',
        ];
    }

    public function authorize()
    {
        return true;
    }

}