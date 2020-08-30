<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainAdminController extends Controller
{
    protected $repo;

    protected function checkPermission($user_id = null){
        if(!isAdmin()){
            if(!isWritter()) abort(403, 'Permission denied');
        }

        if($user_id && isWritter() && !isAdmin()) {
            if(auth()->user()->id != $user_id) abort(403, 'Permission denied');
        }
    }
}
