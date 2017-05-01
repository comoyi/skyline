<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\Controller;

class IndexController extends Controller
{

    /**
     * index
     *
     * @return string
     */
    public function index() {
        return 'web-index';
    }
}
