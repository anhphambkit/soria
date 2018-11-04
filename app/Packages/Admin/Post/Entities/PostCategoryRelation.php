<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/18/18
 * Time: 20:26
 */

namespace App\Packages\Admin\Post\Entities;
use Illuminate\Database\Eloquent\Model;

class PostCategoryRelation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_category_relation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'cate_id'
    ];

    public $timestamps = true;
}