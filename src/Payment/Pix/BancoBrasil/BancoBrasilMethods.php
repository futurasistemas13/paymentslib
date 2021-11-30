<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil;

use Futuralibs\Paymentslib\Exception\HttpRequestException;
use Futuralibs\Paymentslib\HttpRequest;
use Futuralibs\Paymentslib\Interface\Pix\PixInterface;


final class BancoBrasilMethods implements PixInterface
{

    private HttpRequest $httpRequest;

    private BancoBrasilConfiguration $brasilConfiguration;

    private BancoBrasilToken $brasilToken;

    /**
     * @param BancoBrasilConfiguration $brasilConfiguration
     */
    public function __construct(BancoBrasilConfiguration $brasilConfiguration)
    {
        $this->httpRequest = new HttpRequest();

        $this->brasilToken = new BancoBrasilToken($brasilConfiguration);

        $this->brasilConfiguration = $brasilConfiguration;
    }

    /**
     * @throws HttpRequestException
     */
    public function generateToken(): array
    {
        return $this->brasilToken->generateToken();
    }

    public function generateCharge()
    {
        // TODO: Implement generateCharge() method.
    }

    public function queryPix()
    {
        // TODO: Implement getPix() method.
    }

    public function reviewCharge()
    {
        // TODO: Implement ReviewCharge() method.
    }

}