<?php
namespace Packages\Order\Entities;
use Illuminate\Database\Eloquent\Model;
use Packages\Order\Custom\Entities\OrderDetail;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'desc', 'note', 'shipping_address', 'customer_phone', 'customer_name', 'user_id', 'payment_type', 'ship_date', 'fee_ship', 'total', 'tax', 'tax_value', 'shipping_status', 'payment_status'];

    public function orderItems(){
        return $this->hasMany(OrderDetail::class);
    }
}