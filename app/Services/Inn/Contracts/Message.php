<?php

namespace App\Services\Inn\Contracts;

interface Message
{
    public static function fromJson(string $json) : self;
}
