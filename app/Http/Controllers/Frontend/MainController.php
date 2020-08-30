<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    protected $ip_address;

    function __construct(){
        $this->ip_address = \Request::ip();
    }
}
