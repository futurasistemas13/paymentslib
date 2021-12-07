<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Filter;

final class BancoBrasilPagination
{

    /**
     * @var int
     */
    public int $paginaAtual = 1;

    /**
     * @return int
     */
    public function getPaginaAtual(): int
    {
        return $this->paginaAtual;
    }

    /**
     * @param int $paginaAtual
     */
    public function setPaginaAtual(int $paginaAtual): void
    {
        $this->paginaAtual = $paginaAtual;
    }

}