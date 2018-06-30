<?php
namespace Packages\Media\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Packages\Media\Permissions\Permission;
use Packages\User\Custom\Services\RoleServices;

class FileUploadRequest extends FormRequest
{

    public function rules()
    {
        return [
            'file'    => 'required|file|mimes:'. config('media.allow'). '|extension:'. config('media.allow'). '|max:'. config('media.max_file_size')*1024,
        ];
    }

    public function authorize()
    {
        $roleServices = app()->make(RoleServices::class);
        return $roleServices->hasAccess(Permission::MEDIA_UPLOAD);
    }
}