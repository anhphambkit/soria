<?php
namespace Packages\Product\Requests;
use Packages\Core\Requests\CoreFormRequest;
use Packages\User\Custom\Services\RoleServices;
use Packages\Product\Permissions\Permission;

class ManufacturerCreateRequest extends CoreFormRequest
{
    public function rules()
    {
        return [
            'name'  => 'required|min:2|unique:manufacturers,name',
        ];
    }

    public function authorize()
    {
        return true;
    }

}