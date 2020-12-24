<?php

namespace App\Services\Inn;

use App\Jobs\CheckInn;
use App\Models\CheckInnRequest;

class CheckInnBegin
{
    public function make(int $inn)
    {
        $checkInnRequest = new CheckInnRequest(compact('inn'));
        dispatch(new CheckInn($checkInnRequest));
    }
}
