<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/11/18
 * Time: 16:29
 */

namespace App\Packages\Admin\Product\Entities;
use Illuminate\Database\Eloquent\Model;

class ProductFeatureImage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_feature_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'media_id'
    ];

    public $timestamps = true;
}