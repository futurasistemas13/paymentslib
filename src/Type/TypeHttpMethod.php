<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Type;

enum TypeHttpMethod: String{
    case POST = 'post';
    case GET  = 'get';
    case PUT  = 'put';
}