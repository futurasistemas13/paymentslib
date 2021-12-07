<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Entity;

class Schedule
{
    private string $solicitacao;

    private string $liquidacao;

    /**
     * @return string
     */
    public function getSolicitacao(): string
    {
        return $this->solicitacao;
    }

    /**
     * @param string $solicitacao
     * @return Schedule
     */
    public function setSolicitacao(string $solicitacao): self
    {
        $this->solicitacao = $solicitacao;
        return $this;
    }

    /**
     * @return string
     */
    public function getLiquidacao(): string
    {
        return $this->liquidacao;
    }

    /**
     * @param string $liquidacao
     * @return Schedule
     */
    public function setLiquidacao(string $liquidacao): self
    {
        $this->liquidacao = $liquidacao;
        return $this;
    }

}