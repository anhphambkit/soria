<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/19/19
 * Time: 08:32
 */

namespace App\Packages\Admin\Shop\Entities;


use Illuminate\Database\Eloquent\Model;

class AddressBook extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'address_book';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_address_book',
        'full_name',
        'mobile_phone',
        'province_city_code',
        'district_code',
        'ward_code',
        'address',
        'is_home',
        'is_guest',
        'user_id'
    ];

    public $timestamps = true;
}