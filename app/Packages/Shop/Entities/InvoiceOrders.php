<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 12:34
 */

namespace App\Packages\Shop\Entities;


use Illuminate\Database\Eloquent\Model;

class InvoiceOrders extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoice_orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer',
        'mobile_phone',
        'address',
        'shipping_method',
        'payment_method',
        'sub_total',
        'discount_on_products',
        'discount_price',
        'shipping_fee',
        'total_price',
        'discount_code',
        'is_home',
        'is_free_shipping',
        'is_guest',
        'user_id'
    ];

    public $timestamps = true;
}