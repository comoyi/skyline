<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class IndexController extends Controller
{

    /**
     * index
     *
     * @return string
     */
    public function index() {
        return 'api-index';
    }
}
