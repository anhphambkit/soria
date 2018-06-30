<?php
namespace Packages\Order\Entities;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['order_id', 'product_id', 'price', 'sale_price', 'quantity', 'total', 'size', 'color'];
}