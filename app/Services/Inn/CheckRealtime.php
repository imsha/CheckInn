<?php

namespace App\Services\Inn;

use App\Services\Inn\Messages\Error;
use App\Services\Inn\Messages\Success;
use Carbon\Carbon;

class CheckRealtime
{
    /**
     * Проверка инн в реальном времени, без кеша и очереди
     * @param int $inn
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function make(int $inn) : array
    {
        $apiClient = new ApiClient();
        $result = [];
        try {
            $message = $apiClient->check($inn, Carbon::now());

            switch (get_class($message)) {
                case Success::class;
                    $result['success'] = true;
                    $result['status'] = $message->status;
                    $result['message'] = $message->message;
                    break;
                case Error::class;
                    $result['success'] = false;
                    $result['code'] = $message->code;
                    $result['errors'] = $message->message;
                    break;
            }
        } catch (\Exception $exception) {
            $result['success'] = false;
            $result['errors'] = $exception->getMessage();
        }
        return $result;
    }
}
