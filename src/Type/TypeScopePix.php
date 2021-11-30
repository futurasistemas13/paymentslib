<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Type;

use Futuralibs\Futurautils\Trait\EnumTrait;

enum TypeScopePix: string
{
    use EnumTrait ;

    case PREAD = 'pix.read';
    case PWRITE  = 'pix.write';
}