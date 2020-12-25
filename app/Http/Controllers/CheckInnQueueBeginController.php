<?php

namespace App\Http\Controllers;

use App\Http\Requests\Inn\Check;
use App\Services\Inn\CheckInnBegin;

class CheckInnQueueBeginController extends Controller
{
    public function __invoke(Check $request, CheckInnBegin $service)
    {
        return $service->make($request);
    }
}
