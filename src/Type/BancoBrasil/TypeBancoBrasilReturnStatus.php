<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Type\BancoBrasil;

use Futuralibs\Futurautils\Trait\EnumTrait;

enum TypeBancoBrasilReturnStatus: String{

    use EnumTrait;

    case EM_PROCESSAMENTO = 'EM_PROCESSAMENTO';
    case DEVOLVIDO = 'DEVOLVIDO';
    case NAO_REALIZADO = 'NAO_REALIZADO';
}