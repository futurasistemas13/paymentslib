<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Type;

use Futuralibs\Futurautils\Trait\EnumTrait;

enum TypeBank: String {

    use EnumTrait ;

    case BancoBrasil = '001';

    public function bank(): string
    {
        return match($this)
        {
            self::BancoBrasil => 'Banco do Brasil',
        };
    }
}