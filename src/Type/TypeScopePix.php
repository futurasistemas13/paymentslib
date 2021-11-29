<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Type;

enum TypeScopePix: string
{
    use \Futuralibs\Futurautils\Trait\EnumTrait;

    case PREAD = 'pix.read';
    case PWRITE  = 'pix.write';
}