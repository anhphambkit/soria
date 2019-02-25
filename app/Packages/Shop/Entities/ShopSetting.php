<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 22:03
 */

namespace App\Packages\Shop\Entities;

use Illuminate\Database\Eloquent\Model;

class ShopSetting extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shop_settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shop_logo',
        'shop_favicon',
        'shop_address',
        'shop_phone',
        'shop_phone_secondary',
        'shop_work_hours',
        'shop_email',
        'shop_facebook',
        'shop_twitter',
        'shop_instagram',
        'shop_signature',
    ];

    public $timestamps = true;
}