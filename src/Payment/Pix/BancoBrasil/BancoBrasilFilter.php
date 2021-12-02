<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil;

use Futuralibs\Paymentslib\Interface\Pix\PixFilterInterface;
use Futuralibs\Paymentslib\Filter\AbstractFilter;

class BancoBrasilFilter implements PixFilterInterface
{

    /**
     * @var string|null
     */
    public ?string $inicio = null;

    /**
     * @var string|null
     */
    public ?string $fim = null;

    /**
     * @var int
     */
    public int $paginaAtual = 1;

}