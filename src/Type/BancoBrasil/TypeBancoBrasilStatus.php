<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Type\BancoBrasil;

use Exception;
use Futuralibs\Futurautils\Trait\EnumTrait;

enum TypeBancoBrasilStatus: int {

    use EnumTrait;

    case ATIVA = 1;
    case CONCLUIDA = 2;
    case REMOVIDA_PELO_USUARIO_RECEBEDOR = 3;
    case REMOVIDA_PELO_PSP  = 4;

    public function getName(): string
    {
        return match($this)
        {
            self::ATIVA => 'ATIVA',
            self::CONCLUIDA => 'CONCLUIDA',
            self::REMOVIDA_PELO_USUARIO_RECEBEDOR => 'REMOVIDA_PELO_USUARIO_RECEBEDOR',
            self::REMOVIDA_PELO_PSP => 'REMOVIDA_PELO_PSP',
        };
    }

}