<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Filter;

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
     * @var BancoBrasilPagination
     */
    private BancoBrasilPagination $paginacao;

    public function __construct()
    {
        $this->paginacao = new BancoBrasilPagination();
    }

    /**
     * @return string|null
     */
    public function getInicio(): ?string
    {
        return $this->inicio;
    }

    /**
     * @param string|null $inicio
     */
    public function setInicio(?string $inicio): void
    {
        $this->inicio = $inicio;
    }

    /**
     * @return string|null
     */
    public function getFim(): ?string
    {
        return $this->fim;
    }

    /**
     * @param string|null $fim
     */
    public function setFim(?string $fim): void
    {
        $this->fim = $fim;
    }

    /**
     * @return BancoBrasilPagination
     */
    public function Paginacao(): BancoBrasilPagination
    {
        return $this->paginacao;
    }

}