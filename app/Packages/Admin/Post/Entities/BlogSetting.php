<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 22:00
 */

namespace App\Packages\Admin\Post\Entities;

use Illuminate\Database\Eloquent\Model;

class BlogSetting extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog_settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'blog_logo',
        'blog_favicon',
        'blog_avatar_author',
        'blog_hi_sentence',
        'blog_introduce_author',
        'blog_short_description',
        'blog_facebook',
        'blog_twitter',
        'blog_instagram',
        'blog_personal_images',
        'blog_signature',
    ];

    public $timestamps = true;
}