<?php

namespace App\Http\Controllers;

use App\Http\Requests\Inn\Check;
use App\Services\Inn\CheckRealtime;

class CheckInnRealtimeController extends Controller
{

    public function form()
    {
        return view('inn.form');
    }

    /**
     * @param Check         $request
     * @param CheckRealtime $service
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function check(Check $request, CheckRealtime $service)
    {
        $inn = $request->input('inn');
        return redirect()->back()->with($service->make($inn));
    }

}
