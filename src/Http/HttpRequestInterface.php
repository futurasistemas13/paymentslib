<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Http;

use Futuralibs\Paymentslib\Interface\HttpClient\HttpClientInterface;
use Futuralibs\Futurautils\Type\TypeHttpMethod;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ClientException;
use Futuralibs\Paymentslib\Exception\HttpRequestException;


class HttpRequestInterface implements HttpClientInterface
{

    private Client $httpRequest;

    /**
     * @param array $config
     * @see \GuzzleHttp\RequestOptions for a list of available request options.
     */
    public function __construct(array $config = [])
    {
        $this->httpRequest = new Client($config);
    }

    /**
     * @return Client
     */
    public function getHttpClient(): Client
    {
        return $this->httpRequest;
    }

    /**
     * @param TypeHttpMethod $method
     * @param string $url
     * @param array $options
     * @return mixed
     * @throws HttpRequestException
     *
     * @see \GuzzleHttp\RequestOptions for a list of available request options.
     */
    public function request(TypeHttpMethod $method, string $url, array $options = []): mixed
    {
        try {

            $response = $this->httpRequest->request($method->value, $url, $options);

            $content = json_decode($response->getBody()->getContents(), true);

            if ((is_array($content)) && (($response->getStatusCode() >= 200) && ($response->getStatusCode() < 300)) ){
                return $content;
            }else{
                throw new HttpRequestException($response->getBody()->getContents(), $response->getStatusCode());
            }

            return $content;

        } catch(ClientException $e) {
            throw new HttpRequestException($e->getResponse()->getBody()->getContents(), $e->getCode());
        } catch (GuzzleException $e) {
            throw new HttpRequestException($e->getMessage(), $e->getCode());
        }
    }

}