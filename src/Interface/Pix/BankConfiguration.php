<?php


namespace Futuralibs\Paymentslib\Interface\Pix;


use Futuralibs\Paymentslib\Type\TypeEnvironment;

interface BankConfiguration
{
    public function getEnvironment(): TypeEnvironment;

    public function getUrlEnvironment(): string;

}