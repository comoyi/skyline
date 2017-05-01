<?php

namespace App\Http\Controllers\Service;

use Illuminate\Http\Request;
use App\Http\Controllers\Service\Controller;

class IndexController extends Controller
{

    /**
     * index
     *
     * @return string
     */
    public function index() {
        return 'service-index';
    }
}
