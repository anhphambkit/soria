<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/27/19
 * Time: 19:06
 */

namespace App\Packages\Admin\Product\Entities;
use Illuminate\Database\Eloquent\Model;

class GuestInfo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'guest_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip', 'device'
    ];

    public $timestamps = true;
}