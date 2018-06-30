<?php
namespace Packages\Post\Custom\Repositories\Eloquent;

use Packages\Post\Repositories\Eloquent\EloquentCategoryRepositories as CoreEloquentCategoryRepositories;

class EloquentCategoryRepositories extends CoreEloquentCategoryRepositories implements \Packages\Post\Custom\Repositories\CategoryRepositories
{
}