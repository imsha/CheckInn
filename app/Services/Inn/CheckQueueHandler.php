<?php

namespace App\Services\Inn;

use App\Jobs\CheckInn;
use App\Models\CheckInnRequest;
use App\Services\Inn\Messages\Error;
use App\Services\Inn\Messages\Success;
use Carbon\Carbon;

class CheckQueueHandler
{

    /**
     * @param CheckInn        $job
     * @param CheckInnRequest $checkInnRequest
     */
    public function make(CheckInn $job, CheckInnRequest $checkInnRequest) : array
    {
        $apiClient = new ApiClient();
        try {
            $message = $apiClient->check($checkInnRequest->inn, Carbon::now());
            switch (get_class($message)) {
                case Success::class;
                    $checkInnRequest->update([
                        'status' => $message->status,
                        'message' => $message->message,
                    ]);
                    break;
                case Error::class;
                    switch ($message->code) {
                        case ApiClient::ERROR_VALIDATION:
                        case ApiClient::ERROR_UNAVAILABLE:
                            $checkInnRequest->update([
                                'status' => false,
                                'message' => $message->message,
                            ]);
                            break;
                        case ApiClient::ERROR_LIMITED:
                            dispatch($job)->delay(30);
                            break;
                    }
                    break;
            }
        } catch (\Exception $exception) {
            $job->fail($exception);
        }
    }
}
