<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/26/19
 * Time: 00:48
 */

namespace App\Packages\SystemGeneral\Entities;


use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'general_settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'main_type',
        'sub_type',
        'slug',
        'name',
        'value',
        'apply_for',
        'order',
        'code',
        'is_publish'
    ];

    public $timestamps = true;
}