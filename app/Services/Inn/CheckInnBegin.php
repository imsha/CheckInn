<?php

namespace App\Services\Inn;

use App\Http\Requests\Inn\Check;
use App\Jobs\CheckInn;
use App\Models\CheckInnRequest;

class CheckInnBegin
{
    public function make(Check $request)
    {
        $inn = $request->input('inn');
        $checkInnRequest = CheckInnRequest::lastChecks()->where([
            'inn' => $inn,
        ])->first();
        if($checkInnRequest) {
            if(is_null($checkInnRequest->status)) {
                return [
                    'state' => 'process',
                    'result' => $checkInnRequest->toArray(),
                ];
            }
            return [
                'state' => 'success',
                'result' => $checkInnRequest->toArray(),
            ];
        }
        $checkInnRequest = new CheckInnRequest(compact('inn'));
        $checkInnRequest->save();
        dispatch(new CheckInn($checkInnRequest));
        return [
            'state' => 'started',
            'result' => $checkInnRequest->toArray(),
        ];
    }
}
