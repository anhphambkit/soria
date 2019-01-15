<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/7/18
 * Time: 03:37
 */

namespace App\Packages\Admin\Product\Entities;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'sku', 'desc', 'long_desc',
        'is_publish', 'is_feature', 'is_best_seller', 'is_free_ship',
        'price', 'sale_price', 'in_stock', 'manager_stock',
        'allow_order', 'rating', 'meta_title', 'meta_keywords', 'meta_description'
    ];

    public $timestamps = true;

    public function getCategoryNameAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getCategoryIdAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getFeatureImagesAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getGalleryImagesAttribute($value)
    {
        return json_decode($value, true);
    }
}