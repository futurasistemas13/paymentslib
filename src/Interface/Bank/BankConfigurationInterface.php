<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Interface\Bank;

use Futuralibs\Futurautils\Type\TypeEnvironment;

interface BankConfigurationInterface
{
    public function getTypeBank(): string;

    public function getEnvironment(): TypeEnvironment;

    public function getUrlEnvironment(): string;
}