<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function respondWithJson($object)
    {
        return response()->json($object,200,[],JSON_UNESCAPED_UNICODE);
    }
}
