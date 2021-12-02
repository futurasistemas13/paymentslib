<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil;

use Futuralibs\Paymentslib\Exception\HttpRequestException;
use Futuralibs\Paymentslib\Http\HttpRequestBancoBrasil;
use Futuralibs\Paymentslib\Interface\Pix\PixDataInterface;
use Futuralibs\Paymentslib\Interface\Pix\PixFilterInterface;
use Futuralibs\Paymentslib\Interface\Pix\PixInterface;
use Futuralibs\Paymentslib\Payment\Pix\AbstractPixBank;
use Futuralibs\Futurautils\Type\TypeHttpMethod;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Entity\BancoBrasil;
use Futuralibs\Paymentslib\Validator\BaseValidator;


final class BancoBrasilMethods extends AbstractPixBank implements PixInterface
{
    private BaseValidator $baseValidator;

    private HttpRequestBancoBrasil $httpRequestBancoBrasil;

    private BancoBrasilConfiguration $brasilConfiguration;

    /**
     * @param BancoBrasilConfiguration $brasilConfiguration
     */
    public function __construct(BancoBrasilConfiguration $brasilConfiguration)
    {
        parent::__construct(new BancoBrasilRequestToken($brasilConfiguration));

        $this->httpRequestBancoBrasil = new HttpRequestBancoBrasil($brasilConfiguration);

        $this->brasilConfiguration = $brasilConfiguration;

        $this->baseValidator = new BaseValidator();
    }

    /**
     * @param BancoBrasil|PixDataInterface $data
     * @return mixed
     * @throws HttpRequestException
     */
    public function generateCharge(BancoBrasil|PixDataInterface $data): mixed
    {
        $url = $this->brasilConfiguration->getUrlEnvironment(). '/pix/v1/cob/';
        $options = array(
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => $this->token->getBearerToken()
            ],
            'body' => json_encode($data)
        );

        return $this->httpRequestBancoBrasil->request(TypeHttpMethod::PUT, $url, $options);
    }

    /**
     * @param BancoBrasil|PixFilterInterface|null $data
     * @return mixed
     * @throws HttpRequestException
     */
    public function queryPix(BancoBrasil|PixFilterInterface $data = null)
    {
        $url = $this->brasilConfiguration->getUrlEnvironment(). '/pix/v1/';
        $options = array(
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => $this->token->getBearerToken(),
            ],
            'query' => get_object_vars($data)
        );
        return $this->httpRequestBancoBrasil->request(TypeHttpMethod::GET, $url, $options);
    }

    /**
     * @param $id
     * @return mixed
     * @throws HttpRequestException
     */
    public function queryPixId($id): mixed
    {
        $url = $this->brasilConfiguration->getUrlEnvironment(). '/pix/v1/cob/' .$id;
        $options = array(
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => $this->token->getBearerToken()
            ]
        );
        return $this->httpRequestBancoBrasil->request(TypeHttpMethod::GET, $url, $options);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     * @throws HttpRequestException
     */
    public function reviewCharge($id, $data): mixed
    {
        $url = $this->brasilConfiguration->getUrlEnvironment(). '/pix/v1/cob/' .$id;

        $options = array(
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => $this->token->getBearerToken()
            ],
            'body' => json_encode($data)
        );
        return $this->httpRequestBancoBrasil->request(TypeHttpMethod::PATCH, $url, $options);
    }

}