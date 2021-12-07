<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Response;

use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Entity\Client;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class BancoBrasilQueryResponse
{
    private string $endToEndId;

    private ?string $txid;

    private string $valor;

    private string $horario;

    private Client $pagador;

    private string $infoPagador;

    private $devolucoes;

    public function __construct()
    {
        $this->pagador = new Client();
        $this->devolucoes = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getEndToEndId(): string
    {
        return $this->endToEndId;
    }

    /**
     * @param string $endToEndId
     * @return BancoBrasilQueryResponse
     */
    public function setEndToEndId(string $endToEndId): self
    {
        $this->endToEndId = $endToEndId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTxid(): ?string
    {
        return $this->txid;
    }

    /**
     * @param string|null $txid
     * @return BancoBrasilQueryResponse
     */
    public function setTxid(?string $txid): self
    {
        $this->txid = $txid;
        return $this;
    }

    /**
     * @return string
     */
    public function getValor(): string
    {
        return $this->valor;
    }

    /**
     * @param string $valor
     * @return BancoBrasilQueryResponse
     */
    public function setValor(string $valor): self
    {
        $this->valor = $valor;
        return $this;
    }

    /**
     * @return string
     */
    public function getHorario(): string
    {
        return $this->horario;
    }

    /**
     * @param string $horario
     * @return BancoBrasilQueryResponse
     */
    public function setHorario(string $horario): self
    {
        $this->horario = $horario;
        return $this;
    }

    /**
     * @return Client
     */
    public function Pagador(): Client
    {
        return $this->pagador;
    }

    /**
     * @return string
     */
    public function getInfoPagador(): string
    {
        return $this->infoPagador;
    }

    /**
     * @param string $infoPagador
     * @return BancoBrasilQueryResponse
     */
    public function setInfoPagador(string $infoPagador): self
    {
        $this->infoPagador = $infoPagador;
        return $this;
    }

    /**
     * @return Collection
     */
    public function Devolucoes(): Collection
    {
        return $this->devolucoes;
    }

}