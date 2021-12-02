<?php

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Entity;

use Futuralibs\Paymentslib\Interface\Pix\PixDataInterface;
use Futuralibs\Paymentslib\Payment\Pix\AbstractPixEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Futuralibs\Futurautils\Trait\JsonSerializable\JsonWithOutNull;

class BancoBrasil extends AbstractPixEntity implements PixDataInterface
{
    use JsonWithOutNull;

    /**
     * @var Calendar
     * @Assert\Valid
     */
    private Calendar $calendario;

    /**
     * @var BancoBrasilDocument
     * @Assert\Valid
     */
    private BancoBrasilDocument $devedor;

    /**
     * @var Value
     * @Assert\Valid
     */
    private Value $valor;

    /**
     * @var string
     * @Assert\NotBlank
     */
    private string $chave;

    private ?string $solicitacaoPagador = null;

    public function __construct()
    {
        $this->devedor = new BancoBrasilDocument();
        $this->calendario =  new Calendar();
        $this->valor = new Value();
    }

    /**
     * @return Calendar
     */
    public function Calendario(): Calendar
    {
        return $this->calendario;
    }

    /**
     * @return BancoBrasilDocument
     */
    public function Devedor(): BancoBrasilDocument
    {
       return $this->devedor;
    }

    /**
     * @return Value
     */
    public function Valor(): Value
    {
        return $this->valor;
    }

    /**
     * @return string
     */
    public function getChave(): string
    {
        return $this->chave;
    }

    /**
     * @param string $chave
     * @return BancoBrasil
     */
    public function setChave(string $chave): self
    {
        $this->chave = $chave;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSolicitacaoPagador(): ?string
    {
        return $this->solicitacaoPagador;
    }

    /**
     * @param string|null $solicitacaoPagador
     * @return BancoBrasil
     */
    public function setSolicitacaoPagador(?string $solicitacaoPagador): self
    {
        $this->solicitacaoPagador = $solicitacaoPagador;
        return $this;
    }

}