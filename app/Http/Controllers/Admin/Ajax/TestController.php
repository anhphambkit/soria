<?php

namespace App\Http\Controllers\Admin\Ajax;

use Illuminate\Http\Request;
use App\Core\Controllers\CoreAjaxController;

class TestController extends CoreAjaxController
{
    public function test() {
        $this->response('hello');
    }
}