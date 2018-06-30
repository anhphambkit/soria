<?php
namespace Packages\Post\Entities;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'post_categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'parent_id', 'desc', 'order', 'slug'];
}