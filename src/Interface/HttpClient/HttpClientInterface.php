<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Interface\HttpClient;

use Futuralibs\Futurautils\Type\Http\TypeHttpMethod;

interface HttpClientInterface
{
    public function getHttpClient();

    public function request(TypeHttpMethod $method, string $url, array $options = []);

}