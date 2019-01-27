<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/26/19
 * Time: 12:26
 */

namespace App\Packages\Admin\Product\Entities;
use Illuminate\Database\Eloquent\Model;

class UserShoppingCart extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_shopping_cart';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'product_id', 'quantity', 'order'
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

    public function getCategoriesAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getMediasAttribute($value)
    {
        return json_decode($value, true);
    }
}