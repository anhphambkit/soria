<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/14/18
 * Time: 20:49
 */

namespace App\Http\Controllers\Admin\Ajax;

use Illuminate\Http\Request;
use App\Core\Controllers\CoreAjaxController;

class ProductController extends CoreAjaxController
{
    public function createNewProductCategory(Request $request) {
        $this->response('hello');
    }
}