<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil;

use Futuralibs\Paymentslib\Exception\HttpRequestException;
use Futuralibs\Paymentslib\Http\HttpRequestInterface;
use Futuralibs\Paymentslib\Interface\Token\TokenInterface;
use Futuralibs\Futurautils\Type\TypeEnvironment;
use Futuralibs\Futurautils\Type\Http\TypeHttpMethod;
use Futuralibs\Paymentslib\Type\TypeScopePix;

final class BancoBrasilRequestToken implements TokenInterface
{

    const GRANT_TYPE = 'client_credentials';

    private HttpRequestInterface $httpRequest;

    private string $urlEnvironment;

    /**
     * @param BancoBrasilConfiguration $brasilConfiguration
     */
    public function __construct(BancoBrasilConfiguration $brasilConfiguration)
    {
        $environments = [
            TypeEnvironment::SandBox->name => 'https://oauth.hm.bb.com.br/oauth/token',
            TypeEnvironment::Production->name => 'https://oauth.bb.com.br/oauth/token'
        ];

        $this->urlEnvironment = $environments[$brasilConfiguration->getEnvironment()->name];

        $this->httpRequest = new HttpRequestInterface([
            'headers' => [
                'Content-Type'  => 'application/x-www-form-urlencoded',
                'Authorization' => $brasilConfiguration->getBasic()
            ]
        ]);
    }

    /**
     * @return mixed
     * @throws HttpRequestException
     */
    public function generateToken(): mixed
    {
        return $this->httpRequest->request(TypeHttpMethod::POST, $this->urlEnvironment, [
            'form_params' => [
                'grant_type' => self::GRANT_TYPE,
                'scope' => implode(' ', TypeScopePix::getArray())
            ]
        ]);
    }

    /**
     * @throws HttpRequestException
     */
    public function getBearerToken(): string
    {
        $token = $this->generateToken();

        return 'Bearer '.$token['access_token'];
    }

    public function refreshToken()
    {
        // TODO: Implement refreshToken() method.
    }
}