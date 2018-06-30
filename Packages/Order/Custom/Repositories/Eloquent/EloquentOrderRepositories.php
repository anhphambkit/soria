<?php
namespace Packages\Order\Custom\Repositories\Eloquent;

use Packages\Order\Repositories\Eloquent\EloquentOrderRepositories as CoreEloquentOrderRepositories;

class EloquentOrderRepositories extends CoreEloquentOrderRepositories implements \Packages\Order\Custom\Repositories\OrderRepositories
{
}