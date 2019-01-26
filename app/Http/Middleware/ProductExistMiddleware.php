<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/26/19
 * Time: 10:26
 */

namespace App\Http\Middleware;

use App\Core\Response\Response;
use App\Packages\Admin\Product\Services\ProductServices;

class ProductExistMiddleware
{
    /**
     * @param $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        $productId = intval($request->get('product_id'));
        $isPublish = app()->make(ProductServices::class)->checkProductPublish($productId);
        if ($isPublish) return $next($request);
        return [
            "message" => "ProductNotExist",
            "status" => Response::STATUS_CUSTOM_ERROR
        ];
    }
}
