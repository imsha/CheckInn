<?php

namespace App\Http\Controllers;

use App\Http\Requests\Inn\Check;
use App\Services\Inn\CheckRealtime;

class CheckInnAsyncController extends Controller
{

    public function __invoke()
    {
        return view('inn.asyncForm');
    }

}
