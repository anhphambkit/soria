<?php
namespace Packages\Media\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Packages\Media\Permissions\Permission;
use Packages\User\Custom\Services\RoleServices;

class FileDeleteRequest extends FormRequest
{

    public function rules()
    {
        return [
            'id'    => 'required|exists:media',
        ];
    }

    public function authorize()
    {
        $roleServices = app()->make(RoleServices::class);
        return $roleServices->hasAccess(Permission::MEDIA_DELETE);
    }
}