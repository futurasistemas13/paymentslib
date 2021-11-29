<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Type;

enum TypeEnvironment: String{
    case SandBox = 'SandBox';
    case Production = 'Production';
}