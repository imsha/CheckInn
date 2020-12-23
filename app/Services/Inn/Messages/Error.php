<?php

namespace App\Services\Inn\Messages;

use App\Services\Inn\Contracts\Message;

class Error implements Message
{

    /**
     * Код ошибки
     * @var string
     */
    public $code;

    /**
     * Человеко-понятное сообщение
     * @var string
     */
    public $message;

    /**
     * TaxPayerErrorMessage constructor.
     *
     * @param string   $code
     * @param string $message
     */
    public function __construct(string $code, string $message)
    {
        $this->code = $code;
        $this->message = $message;
    }

    /**
     * Парсин сообщения из json строки
     * @param string $json
     *
     * @return TaxPayerStatusMessage
     */
    public static function fromJson(string $json) : Message
    {
        $arr = json_decode($json, true);
        return new self($arr['code'], $arr['message']);
    }
}
