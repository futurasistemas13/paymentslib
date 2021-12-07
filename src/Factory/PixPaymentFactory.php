<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Factory;

use Futuralibs\Paymentslib\Exception\HttpRequestException;
use Futuralibs\Paymentslib\Exception\ValidationException;
use Futuralibs\Paymentslib\Interface\Factory\FactoryInterface;
use Futuralibs\Paymentslib\Interface\Pix\PixDataInterface;
use Futuralibs\Paymentslib\Interface\Pix\PixFilterInterface;
use Futuralibs\Paymentslib\Interface\Pix\PixInterface;
use Futuralibs\Paymentslib\Type\TypeBank;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\BancoBrasilMethods;
use Futuralibs\Paymentslib\Interface\Bank\BankConfigurationInterface;
use Futuralibs\Paymentslib\Interface\Pix\PixResponseInterface;

final class PixPaymentFactory implements FactoryInterface, PixInterface
{

    private PixInterface $pixPayment;

    /**
     * @param BankConfigurationInterface $bankConfiguration
     * @throws FactoryException
     */
    public function __construct(BankConfigurationInterface $bankConfiguration)
    {
        if ($bankConfiguration->getTypeBank() === TypeBank::BancoBrasil->value) {
            $this->pixPayment = new BancoBrasilMethods($bankConfiguration);
        }

        if (!$this->pixPayment instanceof PixInterface) {
            throw new FactoryException('The object not implements '.get_class(PixInterface::class));
        }
    }

    /**
     * @return array
     */
    public function generateToken(): array
    {
       return  $this->pixPayment->generateToken();
    }

    public function refreshToken()
    {
        return  $this->pixPayment->generateToken();
    }

    /**
     * @throws HttpRequestException
     * @throws ValidationException
     */
    public function generateCharge(PixDataInterface $data): PixResponseInterface
    {
        return $this->pixPayment->generateCharge($data);
    }

    /**
     * @throws HttpRequestException
     */
    public function queryPix(PixFilterInterface $data = null): iterable
    {
        return $this->pixPayment->queryPix($data);
    }

    /**
     * @throws HttpRequestException
     */
    public function queryPixId($id): PixResponseInterface
    {
        return $this->pixPayment->queryPixId($id);
    }

    /**
     * @throws HttpRequestException
     */
    public function reviewCharge($id, $data): PixResponseInterface
    {
        return $this->pixPayment->reviewCharge($id, $data);
    }

}