<?php
namespace Packages\Order\Custom\Repositories\Eloquent;

use Packages\Order\Repositories\Eloquent\EloquentOrderDetailRepositories as CoreEloquentOrderDetailRepositories;

class EloquentOrderDetailRepositories extends CoreEloquentOrderDetailRepositories implements \Packages\Order\Custom\Repositories\OrderDetailRepositories
{
}