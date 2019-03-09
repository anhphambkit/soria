<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 12:36
 */

namespace App\Packages\Shop\Entities;


use Illuminate\Database\Eloquent\Model;

class ProductsInOrder extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products_in_order';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'name',
        'slug',
        'sku',
        'categories',
        'medias',
        'price',
        'sale_price',
        'quantity',
    ];

    public $timestamps = true;

    public function getCategoriesAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getMediasAttribute($value)
    {
        return json_decode($value, true);
    }
}