<?php

namespace App\Services\Nalog;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

/**
 * Class TaxPayerClient
 *
 * @package App\Services\Nalog
 */
class TaxPayerClient
{
    private $endpoint = 'https://statusnpd.nalog.ru/api/v1/tracker/taxpayer_status';

    const REQUEST_DATE_FORMAT = 'Y-m-m';

    /**
     * @param ResponseInterface $response
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    protected function response(ResponseInterface $response)
    {
        return $response->getBody();
    }

    /**
     * @param int       $inn
     * @param \DateTime $requestDate
     *
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request(int $inn, \DateTime $requestDate)
    {
        $client = new Client([
            'timeout'  => 60,
        ]);

        return $this->response($client->post($this->endpoint, [
            RequestOptions::JSON => [
                'inn'         => $inn,
                'requestDate' => $requestDate->format(self::REQUEST_DATE_FORMAT)
            ]
        ]));
    }
}

