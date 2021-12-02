<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Http;


use Futuralibs\Paymentslib\Exception\HttpRequestException;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\BancoBrasilConfiguration;
use Futuralibs\Futurautils\Type\TypeEnvironment;
use Futuralibs\Futurautils\Type\TypeHttpMethod;

class HttpRequestBancoBrasil extends HttpRequestInterface
{

    private BancoBrasilConfiguration $brasilConfiguration;

    /**
     * @param BancoBrasilConfiguration $brasilConfiguration
     * @param array $config
     */
    public function __construct(BancoBrasilConfiguration $brasilConfiguration, array $config = [])
    {
        parent::__construct($config);

        $this->brasilConfiguration = $brasilConfiguration;
    }

    /**
     * @throws HttpRequestException
     */
    public function request(TypeHttpMethod $method, string $url, array $options = []): mixed
    {
        if ($this->brasilConfiguration->getEnvironment() === TypeEnvironment::SandBox) {
            $appKey = array(
                'gw-dev-app-key' => $this->brasilConfiguration->getApplicationKey()
            );
            if (isset($options['query'])) {
                $options['query'] = array_merge($options['query'], $appKey);
            } else {
                $options = array_merge($options, ['query' => $appKey]);
            }
        }

        return parent::request($method, $url, $options);
    }

}