<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainApiController extends Controller
{
    protected $repo;

    public function success($data = [], $message = '', $code = 200){

        $responseData['status'] = true;
        $responseData['message'] = $message;
        $responseData['data'] = $data;

        return response()->json($responseData, $code);
    }

    public function error($message = '', $code = 500){
        return response()->json([
            'status'    => false,
            'message'   => $message
        ], $code);
    }
}
