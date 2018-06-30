<?php
namespace Packages\Product\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Packages\Media\Entities\Media;
use Packages\Product\Custom\Entities\Manufacturer;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'sku', 'desc', 'long_desc', 'sale_value', 'sale_type', 'status', 'price', 'img_id', 'slug', 'keywords', 'is_feature', 'is_best_seller', 'is_free_ship', 'sale_price', 'rating', 'manufacturer_id'];

    /**
     * Get all categories
     */
    public function categories(){
        return Cache::remember('model_product_categories'. $this->getKey(), env('SESSION_LIFETIME', 120), function(){
            return $this->belongsToMany(Category::class, 'product_category_relation', 'product_id', 'cat_id')->get();
        });

    }

    /**
     * Thumbnail
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function thumbImg(){
        return Cache::remember('model_product_thumbImg'. $this->getKey(), env('SESSION_LIFETIME', 120), function(){
            return $this->belongsTo(Media::class, 'img_id')->first();
        });

    }

    /**
     * Get all related images
     */
    public function relatedImg(){
        return Cache::remember('model_product_relatedImg'. $this->getKey(), env('SESSION_LIFETIME', 120), function(){
            return $this->belongsToMany(Media::class, 'product_related_images', 'product_id', 'media_id')->get();
        });

    }

    /**
     * Manufacturer
     */
    public function brand(){
        return Cache::remember('model_product_brand'. $this->getKey(), env('SESSION_LIFETIME', 120), function(){
            return $this->belongsTo(Manufacturer::class, 'manufacturer_id')->first();
        });

    }

}