<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/15/18
 * Time: 13:46
 */

namespace App\Packages\Admin\Entities;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'parent_id', 'slug', 'desc', 'order', 'meta_title', 'meta_keywords', 'meta_description'
    ];

    public $timestamps = true;
}