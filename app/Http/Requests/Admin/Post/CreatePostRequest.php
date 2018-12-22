<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/22/18
 * Time: 10:41
 */

namespace App\Http\Requests\Admin\Post;

use App\Packages\SystemGeneral\Constants\ReferencesConfig;
use App\Packages\SystemGeneral\Repositories\ReferenceRepository;
use Illuminate\Foundation\Http\FormRequest;
use App\Core\Requests\CoreFormRequest;

class CreatePostRequest extends CoreFormRequest
{
    protected $referenceRepository;
    public function __construct(ReferenceRepository $referenceRepository) {
        parent::__construct();
        $this->referenceRepository = $referenceRepository;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $wherePostTypes = [
            ['type', '=', ReferencesConfig::POST_TYPE],
        ];
        $postTypes = $this->referenceRepository->getReferenceFromAttribute(ReferencesConfig::REFERENCE_TBL, $wherePostTypes);
        $normalPostType = $postTypes->where('value', '=', ReferencesConfig::NORMAL_POST_TYPE)->first();
        $galleryPostType = $postTypes->where('value', '=', ReferencesConfig::GALLERY_POST_TYPE)->first();
        $slidePostType = $postTypes->where('value', '=', ReferencesConfig::SLIDE_POST_TYPE)->first();
//        $videoPostType = $postTypes->where('value', '=', ReferencesConfig::VIDEO_POST_TYPE)->first();
//        $audioPostType = $postTypes->where('value', '=', ReferencesConfig::AUDIO_POST_TYPE)->first();

        return [
            'name' => 'required',
            'slug' => 'required',
            'desc' => 'required',
            'content' => 'required',
            'keywords' => 'required',
            'category_id' => 'required',
            'type_article' => 'required|numeric',
            'is_publish' => 'required',
            'show_at_homepage' => 'required',
            'imgFeature' => 'required',
            'imgSecondary' => 'required_if:type_article,==,'.$galleryPostType->id,
            'imgSlides' => 'required_if:type_article,==,'.$slidePostType->id,
//            'mediaFeature' => 'required_if:type_article,==,'.$videoPostType->id.'|required_if:type_article,==,'.$audioPostType->id,
        ];
    }
}
