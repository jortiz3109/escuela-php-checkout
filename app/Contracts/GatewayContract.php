<?php

namespace App\Contracts;

interface GatewayContract
{
    public function process(array $data): array;
}
