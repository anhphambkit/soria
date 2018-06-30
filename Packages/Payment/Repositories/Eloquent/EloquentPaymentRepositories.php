<?php
namespace Packages\Payment\Repositories\Eloquent;


use Packages\Core\Traits\Repositories\PackageRepositoriesTrait;
use Packages\Payment\Repositories\PaymentRepositories;

class EloquentPaymentRepositories implements PaymentRepositories
{
    use PackageRepositoriesTrait;
}