<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderNotifyAdminShop extends Mailable implements ShouldQueue
{
    use Queueable;

    public $queue;
    public $shopSettings;
    public $detailOrder;
    public $orderProducts;

    /**
     * OrderNotifyCustomer constructor.
     * @param $shopSettings
     * @param $detailOrder
     * @param $orderProducts
     */
    public function __construct($shopSettings, $detailOrder, $orderProducts)
{
    $this->queue = "email-order";
    $this->shopSettings = $shopSettings;
    $this->detailOrder = $detailOrder;
    $this->orderProducts = $orderProducts;
}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
{
    return $this->view('emails.shop.order-notify-admin-shop');
}
}
