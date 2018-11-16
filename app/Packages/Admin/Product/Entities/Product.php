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
        'allow_order', 'rating', 'keywords'
    ];

    public $timestamps = true;

    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}