<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Type\BancoBrasil;

enum TypeBancoBrasilReturnStatus: String{
    case EM_PROCESSAMENTO = 'EM_PROCESSAMENTO';
    case DEVOLVIDO = 'DEVOLVIDO';
    case NAO_REALIZADO = 'NAO_REALIZADO';
}