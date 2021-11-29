<?php

namespace Futuralibs\Paymentslib\Type;


enum TypeHttpMethod: String{
    case POST = 'post';
    case GET  = 'get';
    case PUT  = 'put';
}