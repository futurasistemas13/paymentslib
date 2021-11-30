<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Exception;

use Exception;
use Throwable;

class HttpRequestException extends Exception
{
    private int $httpCode = 0;

    private string $httpErrorMessage = "";

    public function __construct($message = "", $code = 400, Throwable $previous = null)
    {
        $this->setHttpCode($code);
        $this->setHttpErrorMessage($message);
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return int
     */
    public function getHttpCode(): int
    {
        return $this->httpCode;
    }

    /**
     * @param int $httpCode
     */
    public function setHttpCode(int $httpCode): void
    {
        $this->httpCode = $httpCode;
    }

    /**
     * @return string
     */
    public function getHttpErrorMessage(): string
    {
        return $this->httpErrorMessage;
    }

    /**
     * @param string $httpErrorMessage
     */
    public function setHttpErrorMessage(string $httpErrorMessage): void
    {
        $this->httpErrorMessage = $httpErrorMessage;
    }
}