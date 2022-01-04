<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Type\BancoBrasil;

use Futuralibs\Futurautils\Trait\EnumTrait;

enum TypeBancoBrasilStatus: String{

    use EnumTrait;

    case ATIVA = 'ATIVA';
    case CONCLUIDA = 'CONCLUIDA';
    case REMOVIDA_PELO_USUARIO_RECEBEDOR = 'REMOVIDA_PELO_USUARIO_RECEBEDOR';
    case REMOVIDA_PELO_PSP  = 'REMOVIDA_PELO_PSP ';

    public function getIndex(): int
    {
        return match($this)
        {
            self::ATIVA => 1,
            self::CONCLUIDA => 2,
            self::REMOVIDA_PELO_USUARIO_RECEBEDOR => 3,
            self::REMOVIDA_PELO_PSP => 4,
        };
    }

}