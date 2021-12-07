<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Exception;

use Exception;
use Throwable;
use Futuralibs\Futurautils\Type\Http\TypeHttpCode;

class ValidationException extends Exception
{
    private array $violations;
    private TypeHttpCode $statusCode;
    private array $headers;

    /**
     * ValidationException constructor.
     * @param TypeHttpCode $statusCode
     * @param array|null $violations
     * @param Throwable|null $previous
     * @param array $headers
     * @param int|null $code
     */
    public function __construct(array $violations = null, TypeHttpCode $statusCode = TypeHttpCode::HTTP_BAD_REQUEST, Throwable $previous = null, array $headers = [], ?int $code = 0)
    {
        $this->violations = $violations;
        $this->statusCode = $statusCode;
        $this->headers    = $headers;

        parent::__construct('Invalid parameters', $code, $previous);
    }

    /**
     * @return array|null
     */
    public function getViolations(): ?array
    {
        return $this->violations;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode->value;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

}