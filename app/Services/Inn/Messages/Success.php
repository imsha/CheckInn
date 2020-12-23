<?php

namespace App\Services\Inn\Messages;

use App\Services\Inn\Contracts\Message;

class Success implements Message
{

    /**
     * Самозанятый или нет
     * @var bool
     */
    public $status;

    /**
     * Человеко-понятное сообщение
     * @var string
     */
    public $message;

    /**
     * TaxPayerStatusMessage constructor.
     *
     * @param bool   $status
     * @param string $message
     */
    public function __construct(bool $status, string $message)
    {
        $this->status = $status;
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
        return new self($arr['status'], $arr['message']);
    }
}
