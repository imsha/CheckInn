<?php

namespace App\Services\Inn;

use App\Services\Inn\Contracts\Message;
use App\Services\Inn\Messages\Success;
use App\Services\Inn\Messages\Error;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\RequestOptions;

/**
 * Клиент api публичного сервиса ФНС России "Проверка статуса налогоплательщика налога на профессиональный доход (самозанятого)"
 *
 * @see https://npd.nalog.ru/html/sites/www.npd.nalog.ru/api_statusnpd_nalog_ru.pdf
 *
 * @package App\Services\Inn
 */
class ApiClient
{
    const REQUEST_DATE_FORMAT = 'Y-m-m';
    const ERROR_VALIDATION = 'validation.failed';
    const ERROR_UNAVAILABLE = 'taxpayer.status.service.unavailable.error';
    const ERROR_LIMITED = 'taxpayer.status.service.limited.error';

    const TIMEOUT = 60;

    /**
     * Минимальное время между запросами
     */
    const TIME_BETWEEN_REQUESTS = 30;

    /**
     * @var string
     */
    protected $endpoint = 'https://statusnpd.nalog.ru/api/v1/tracker/taxpayer_status';

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * @param int $timeout
     */
    public function __construct(int $timeout = self::TIMEOUT)
    {
        $this->httpClient = new Client([
            'timeout'  => $timeout,
        ]);
    }

    /**
     * Проверка ИНН
     * @param int       $inn
     * @param \DateTime $requestDate
     *
     * @return Message
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function check(int $inn, \DateTime $requestDate) : Message
    {
        try {
            $response = $this->httpClient->post($this->endpoint, [
                RequestOptions::JSON => [
                    'inn'         => $inn,
                    'requestDate' => $requestDate->format(self::REQUEST_DATE_FORMAT)
                ]
            ]);
            return Success::fromJson($response->getBody());
        } catch (ClientException $exception) {
            return Error::fromJson($exception->getResponse()->getBody());
        }
    }
}
