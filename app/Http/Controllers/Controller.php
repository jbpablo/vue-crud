<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;

abstract class Controller
{
    public function api(Request $request)
    {
        dd($request);

        if($request!=null ) {
            return response()->json('success', 200);
        }
    }
}
