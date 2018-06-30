<?php
namespace Packages\Post\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Packages\Media\Entities\Media;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'content', 'cat_id', 'status', 'desc', 'img_id', 'slug', 'keywords'];

    /**
     * Get all categories
     */
    public function categories(){
        return Cache::remember('model_post_categories'. $this->getKey(), env('SESSION_LIFETIME', 120), function(){
            return $this->belongsTo(Category::class, 'cat_id')->first();
        });
    }

    /**
     * Thumbnail
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function thumbImg(){
        return Cache::remember('model_post_thumbImg'. $this->getKey(), env('SESSION_LIFETIME', 120), function(){
            return $this->belongsTo(Media::class, 'img_id')->first();
        });
    }
}