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
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Filter\BancoBrasilFilter;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Transformer\BancoBrasilQueryResponseTransformer;
use Futuralibs\Paymentslib\Validator\BaseValidator;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Transformer\BancoBrasilResponseTransformer;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Transformer\BancoBrasilQueryIdResponseTransformer;


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
     * @return mixed
     * @throws HttpRequestException
     */
    public function generateCharge(PixDataInterface $data): mixed
    {

        $error = $this->baseValidator->validateBase($data);

        if (count($error) > 0) {
            throw new HttpRequestException('asdasdasdas');
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
     * @return mixed
     * @throws HttpRequestException
     */
    public function queryPix(PixFilterInterface $data = null): mixed
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

        return $this->brasilQueryIdResponseTransformer->transformFromObject(
            $this->httpRequestBancoBrasil->request(TypeHttpMethod::GET, $url, $options)
        );
    }

    /**
     * @param $id
     * @param BancoBrasil $data
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
            'body' => json_encode(['status' => $data->getStatus()])
        );
        return $this->brasilResponseTransformer->transformFromObject(
            $this->httpRequestBancoBrasil->request(TypeHttpMethod::PATCH, $url, $options)
        );
    }

}