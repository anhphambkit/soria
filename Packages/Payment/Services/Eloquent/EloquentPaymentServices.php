<?php
namespace Packages\Payment\Services\Eloquent;
use Packages\Core\Traits\Services\PackageServicesTrait;
use Packages\Payment\Entities\Payment;
use Packages\Payment\Custom\Repositories\PaymentRepositories;
use Packages\Payment\Services\PaymentServices;

class EloquentPaymentServices implements PaymentServices {
    use PackageServicesTrait;

    private $repositories;
    public function __construct(PaymentRepositories $repositories)
    {
        $this->repositories = $repositories;
        $this->repositories->setModel(new Payment());
    }
}