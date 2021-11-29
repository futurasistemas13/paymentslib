<?php

namespace Futuralibs\Paymentslib\Interface\HttpClient;

use Futuralibs\Paymentslib\Type\TypeHttpMethod;

interface HttpClient
{
    public function getHttpClient();

    public function request(TypeHttpMethod $method, string $url, array $options = []);

}