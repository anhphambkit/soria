<?php
namespace Packages\Payment\Custom\Repositories\Eloquent;

use Packages\Payment\Repositories\Eloquent\EloquentPaymentRepositories as CoreEloquentPaymentRepositories;

class EloquentPaymentRepositories extends CoreEloquentPaymentRepositories implements \Packages\Payment\Custom\Repositories\PaymentRepositories
{
}