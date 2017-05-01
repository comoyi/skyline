<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

class IndexController extends Controller
{

    /**
     * index
     *
     * @return string
     */
    public function index() {
        return 'admin-index';
    }
}
