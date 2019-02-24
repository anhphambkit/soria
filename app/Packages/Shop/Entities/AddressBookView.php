<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/23/19
 * Time: 01:32
 */

namespace App\Packages\Shop\Entities;


use Illuminate\Database\Eloquent\Model;

class AddressBookView extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'address_book_view';

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
        'user_id',
        'district_name',
        'province_city_name',
        'ward_name'
    ];

    public $timestamps = true;
}