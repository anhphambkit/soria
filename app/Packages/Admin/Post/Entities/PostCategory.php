<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/15/18
 * Time: 13:46
 */

namespace App\Packages\Admin\Post\Entities;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'post_categories';

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