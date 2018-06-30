<?php
namespace Packages\Product\Requests;
use Packages\Core\Requests\CoreFormRequest;
use Packages\User\Custom\Services\RoleServices;
use Packages\Product\Permissions\Permission;

class ManufacturerUpdateRequest extends CoreFormRequest
{
    public function rules()
    {
        $id = $this->route('id');
        return [
            'name'  => 'required|min:2|unique:manufacturers,name,'. $id. ',id',
        ];
    }

    public function authorize()
    {
        return true;
    }

}