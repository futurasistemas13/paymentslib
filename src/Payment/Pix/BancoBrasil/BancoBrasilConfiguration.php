<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil;

use Futuralibs\Paymentslib\Interface\Bank\BankConfigurationInterface;
use Futuralibs\Futurautils\Type\TypeEnvironment;
use Futuralibs\Paymentslib\Type\TypeBank;

final class BancoBrasilConfiguration implements BankConfigurationInterface
{

    private TypeEnvironment $environment;

    private string $urlEnvironment;

    private string $client_id;

    private string $client_secret;

    private string $developer_application_key;

    private string $basic;

    /**
     * BancoBrasilConfiguration constructor.
     */
    public function __construct(TypeEnvironment $environment)
    {
        $environments = [
            TypeEnvironment::SandBox->name => 'https://api.hm.bb.com.br',
            TypeEnvironment::Production->name => 'https://api.bb.com.br'
        ];

        $this->environment = $environment;

        $this->urlEnvironment = $environments[$environment->name];
    }

    /**
     * @return string
     */
    public function getTypeBank(): string
    {
        return TypeBank::BancoBrasil->value;
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
    public function getDeveloperApplicationKey(): string
    {
        return $this->developer_application_key;
    }

    /**
     * @param string $developer_application_key
     * @return BancoBrasilConfiguration
     */
    public function setDeveloperApplicationKey(string $developer_application_key): BancoBrasilConfiguration
    {
        $this->developer_application_key = $developer_application_key;
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