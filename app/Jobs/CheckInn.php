<?php

namespace App\Jobs;

use App\Models\CheckInnRequest;
use App\Services\Inn\CheckQueueHandler;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckInn implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var CheckInnRequest
     */
    protected $checkInnRequest;

    /**
     * @var CheckQueueHandler
     */
    protected $checkQueueHandler;

    /**
     * CheckInn constructor.
     *
     * @param CheckInnRequest   $checkInnRequest
     */
    public function __construct(CheckInnRequest $checkInnRequest)
    {
        $this->checkInnRequest = $checkInnRequest;
        $this->checkQueueHandler = new CheckQueueHandler();
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle()
    {
        $this->checkQueueHandler->make($this, $this->checkInnRequest);
    }
}
