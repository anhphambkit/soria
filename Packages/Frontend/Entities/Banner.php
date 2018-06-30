<?php
namespace Packages\Frontend\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Packages\Media\Entities\Media;

class Banner extends Model
{
    protected $table = 'product_banners';

    protected $tblBannerImages = 'product_banner_images';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'desc', 'img_id', 'link', 'type', 'data'];

    public function images(){
        return Cache::remember('model_banner_images', env('SESSION_LIFETIME', 120), function(){
            $information = DB::table($this->tblBannerImages)->where('banner_id', $this->getKey())->get();
            foreach ($information as $i => $info){
                $information[$i]->media = Media::find($info->media_id);
            }
            return $information;
        });

    }

    public function image(){
        return $this->belongsTo(Media::class, 'img_id');
    }
}