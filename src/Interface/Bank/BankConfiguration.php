<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Interface\Bank;


use Futuralibs\Paymentslib\Type\TypeEnvironment;

interface BankConfiguration
{
    public function getTypeBank(): string;

    public function getEnvironment(): TypeEnvironment;

    public function getUrlEnvironment(): string;
}