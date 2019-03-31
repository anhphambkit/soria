<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderNotifyCustomer extends Mailable implements ShouldQueue
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
        $orderIdGenerate = "SB" . rand(19,99) . $this->detailOrder->id . rand(19,99);

        return $this->subject(trans('mail-shop.notify_new_order_customer', [ 'orderId' => $orderIdGenerate]))
                    ->view('emails.shop.order-notify-customer')
                    ->with([
                        'shopSettings' => $this->shopSettings,
                        'detailOrder' => $this->detailOrder,
                        'orderProducts' => $this->orderProducts,
                        'orderIdGenerate' => $orderIdGenerate,
                    ]);
    }
}
