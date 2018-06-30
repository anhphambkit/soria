<?php
namespace Packages\Product\Custom\Repositories\Eloquent;

use Packages\Product\Repositories\Eloquent\EloquentCategoryRepositories as CoreEloquentCategoryRepositories;

class EloquentCategoryRepositories extends CoreEloquentCategoryRepositories implements \Packages\Product\Custom\Repositories\CategoryRepositories
{
}