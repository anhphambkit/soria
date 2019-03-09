<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 3/9/19
 * Time: 15:08
 */

namespace App\Packages\SystemGeneral\Entities;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'references';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'slug',
        'value',
        'order',
        'code',
        'is_publish'
    ];

    public $timestamps = true;
}