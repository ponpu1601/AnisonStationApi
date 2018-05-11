<?php

namespace App\Http\Controllers;

class PhpInfoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show()
    {
        return phpinfo();
    }

    //
}
