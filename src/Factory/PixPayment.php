<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Factory;

use Futuralibs\Paymentslib\Exception\FactoryException;
use Futuralibs\Paymentslib\Exception\HttpRequestException;
use Futuralibs\Paymentslib\Interface\Factory\FactoryInterface;
use Futuralibs\Paymentslib\Interface\Pix\PixInterface;
use Futuralibs\Paymentslib\Type\TypeBank;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\BancoBrasilMethods;
use Futuralibs\Paymentslib\Interface\Bank\BankConfiguration;

final class PixPayment implements FactoryInterface, PixInterface
{

    private PixInterface $pixPayment;

    /**
     * @param BankConfiguration $bankConfiguration
     * @throws FactoryException
     */
    public function __construct(BankConfiguration $bankConfiguration)
    {
        if ($bankConfiguration->getTypeBank() === TypeBank::BancoBrasil->value){
            $this->pixPayment = new BancoBrasilMethods($bankConfiguration);
        }

        if (!$this->pixPayment instanceof PixInterface) {
            throw new FactoryException('The object not implements '.get_class(PixInterface::class));
        }
    }

    /**
     * @throws HttpRequestException
     */
    public function generateToken(): array
    {
       return  $this->pixPayment->generateToken();
    }

    public function generateCharge()
    {
        return $this->pixPayment->generateCharge();
    }

    public function queryPix()
    {
        return $this->pixPayment->queryPix();
    }

    public function reviewCharge()
    {
        return $this->pixPayment->reviewCharge();
    }

}