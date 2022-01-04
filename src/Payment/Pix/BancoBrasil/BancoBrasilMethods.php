<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil;

use Futuralibs\Paymentslib\Exception\HttpRequestException;
use Futuralibs\Paymentslib\Http\HttpRequestBancoBrasil;
use Futuralibs\Paymentslib\Interface\Pix\PixDataInterface;
use Futuralibs\Paymentslib\Interface\Pix\PixFilterInterface;
use Futuralibs\Paymentslib\Interface\Pix\PixInterface;
use Futuralibs\Paymentslib\Payment\Pix\AbstractPixBank;
use Futuralibs\Futurautils\Type\Http\TypeHttpMethod;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Entity\BancoBrasil;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Filter\BancoBrasilFilter;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Transformer\BancoBrasilQueryResponseTransformer;
use Futuralibs\Paymentslib\Validator\BaseValidator;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Transformer\BancoBrasilResponseTransformer;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Transformer\BancoBrasilQueryIdResponseTransformer;
use Futuralibs\Paymentslib\Exception\ValidationException;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Response\BancoBrasilResponse;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Response\BancoBrasilQueryIdResponse;


final class BancoBrasilMethods extends AbstractPixBank implements PixInterface
{
    private BaseValidator $baseValidator;

    private HttpRequestBancoBrasil $httpRequestBancoBrasil;

    private BancoBrasilConfiguration $brasilConfiguration;

    private BancoBrasilResponseTransformer $brasilResponseTransformer;

    private BancoBrasilQueryResponseTransformer $brasilQueryResponseTransformer;

    private BancoBrasilQueryIdResponseTransformer $brasilQueryIdResponseTransformer;

    /**
     * @param BancoBrasilConfiguration $brasilConfiguration
     */
    public function __construct(BancoBrasilConfiguration $brasilConfiguration)
    {
        parent::__construct(new BancoBrasilRequestToken($brasilConfiguration));

        $this->httpRequestBancoBrasil = new HttpRequestBancoBrasil($brasilConfiguration);

        $this->brasilConfiguration = $brasilConfiguration;

        $this->baseValidator = new BaseValidator();

        $this->brasilResponseTransformer = new BancoBrasilResponseTransformer();

        $this->brasilQueryResponseTransformer = new BancoBrasilQueryResponseTransformer();

        $this->brasilQueryIdResponseTransformer = new BancoBrasilQueryIdResponseTransformer();
    }

    /**
     * @param BancoBrasil $data
     * @return BancoBrasilResponse
     * @throws HttpRequestException
     * @throws ValidationException
     */
    public function generateCharge(PixDataInterface $data): BancoBrasilResponse
    {
        $error = $this->baseValidator->validateBase($data);

        if (count($error) > 0) {
            throw new ValidationException($error) ;
        }

        $url = $this->brasilConfiguration->getUrlEnvironment(). '/pix/v1/cob/';
        $options = array(
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => $this->token->getBearerToken(),
            ],
            'body' => json_encode($data)
        );

        return $this->brasilResponseTransformer->transformFromObject(
            $this->httpRequestBancoBrasil->request(TypeHttpMethod::PUT, $url, $options)
        );
    }

    /**
     * @param BancoBrasilFilter|null $data
     * @return iterable
     * @throws HttpRequestException
     */
    public function queryPix(PixFilterInterface $data = null): iterable
    {
        $url = $this->brasilConfiguration->getUrlEnvironment(). '/pix/v1/';
        $options = array(
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => $this->token->getBearerToken(),
            ],
            'query' => get_object_vars($data)
        );

        return $this->brasilQueryResponseTransformer->transformFromObjects(
            $this->httpRequestBancoBrasil->request(TypeHttpMethod::GET, $url, $options)['pix']
        );

    }

    /**
     * @param $id
     * @return BancoBrasilQueryIdResponse
     * @throws HttpRequestException
     */
    public function queryPixId($id): BancoBrasilQueryIdResponse
    {
        $url = $this->brasilConfiguration->getUrlEnvironment(). '/pix/v1/cob/' .$id;
        $options = array(
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => $this->token->getBearerToken()
            ]
        );

        return $this->brasilQueryIdResponseTransformer->transformFromObject(
            $this->httpRequestBancoBrasil->request(TypeHttpMethod::GET, $url, $options)
        );
    }

    /**
     * @param $id
     * @param BancoBrasil $data
     * @return BancoBrasilResponse
     * @throws HttpRequestException
     */
    public function reviewCharge($id, $data): BancoBrasilResponse
    {
        $url = $this->brasilConfiguration->getUrlEnvironment(). '/pix/v1/cob/' .$id;

        $options = array(
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => $this->token->getBearerToken()
            ],
            'body' => json_encode(['status' => $data->getStatus()])
        );
        return $this->brasilResponseTransformer->transformFromObject(
            $this->httpRequestBancoBrasil->request(TypeHttpMethod::PATCH, $url, $options)
        );
    }

}