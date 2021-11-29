<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil;

use Futuralibs\Paymentslib\Interface\Pix\BankConfiguration;
use Futuralibs\Paymentslib\Type\TypeEnvironment;

class BancoBrasilConfiguration implements BankConfiguration
{

    private TypeEnvironment $environment;

    private string $urlEnvironment;

    private string $client_id;

    private string $client_secret;

    private string $application_key;

    private string $basic;

    /**
     * BancoBrasilConfiguration constructor.
     */
    public function __construct(TypeEnvironment $environment)
    {
        $environments = [
            TypeEnvironment::SandBox->name => 'https://api.hm.bb.com.br/',
            TypeEnvironment::Production->name => 'https://api.bb.com.br/'
        ];

        $this->environment = $environment;

        $this->urlEnvironment = $environments[$environment->name];
    }

    /**
     * @return TypeEnvironment
     */
    public function getEnvironment(): TypeEnvironment
    {
        return $this->environment;
    }

    /**
     * @return string
     */
    public function getUrlEnvironment(): string
    {
        return $this->urlEnvironment;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->client_id;
    }

    /**
     * @param string $client_id
     * @return BancoBrasilConfiguration
     */
    public function setClientId(string $client_id): BancoBrasilConfiguration
    {
        $this->client_id = $client_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->client_secret;
    }

    /**
     * @param string $client_secret
     * @return BancoBrasilConfiguration
     */
    public function setClientSecret(string $client_secret): BancoBrasilConfiguration
    {
        $this->client_secret = $client_secret;
        return $this;
    }

    /**
     * @return string
     */
    public function getApplicationKey(): string
    {
        return $this->application_key;
    }

    /**
     * @param string $application_key
     * @return BancoBrasilConfiguration
     */
    public function setApplicationKey(string $application_key): BancoBrasilConfiguration
    {
        $this->application_key = $application_key;
        return $this;
    }

    /**
     * @return string
     */
    public function getBasic(): string
    {
        return $this->basic;
    }

    /**
     * @param string $basic
     * @return BancoBrasilConfiguration
     */
    public function setBasic(string $basic): BancoBrasilConfiguration
    {
        $this->basic = $basic;
        return $this;
    }

}