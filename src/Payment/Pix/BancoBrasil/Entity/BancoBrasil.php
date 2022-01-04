<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Entity;

use Futuralibs\Paymentslib\Interface\Pix\PixDataInterface;
use Futuralibs\Paymentslib\Payment\Pix\AbstractPixEntity;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Response\BancoBrasilResponse;
use Futuralibs\Paymentslib\Type\BancoBrasil\TypeBancoBrasilStatus;
use Symfony\Component\Validator\Constraints as Assert;
use Futuralibs\Futurautils\Trait\JsonSerializable\JsonWithOutNull;
use Futuralibs\Futurautils\Constraint as FuturaConstraint;
use Futuralibs\Futurautils\Type\TypeAttributeIgnore;

class BancoBrasil extends AbstractPixEntity implements PixDataInterface
{
    use JsonWithOutNull;


    /**
     * @var string|null
     * @FuturaConstraint\Optional({
     *      @Assert\NotBlank,
     *      @Assert\NotNull,
     *      @Assert\Choice(callback={"Futuralibs\Paymentslib\Type\BancoBrasil\TypeBancoBrasilStatus", "getArray"})
     * })
     */
    #[Serializable(ignore: [TypeAttributeIgnore::IgnoreNull])]
    private ?string $status = null;

    /**
     * @var Calendar
     * @Assert\Valid
     */
    #[Serializable()]
    private Calendar $calendario;

    /**
     * @var Client
     * @Assert\Valid
     */
    #[Serializable()]
    private Client $devedor;

    /**
     * @var Value
     * @Assert\Valid
     */
    #[Serializable()]
    private Value $valor;

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\NotNull
     */
    #[Serializable()]
    private string $chave;

    #[Serializable(ignore: [TypeAttributeIgnore::IgnoreNull])]
    private ?string $solicitacaoPagador = null;

    public function __construct()
    {
        $this->devedor = new Client();
        $this->calendario =  new Calendar();
        $this->valor = new Value();
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param TypeBancoBrasilStatus|null $status
     * @return BancoBrasilResponse
     */
    public function setStatus(?TypeBancoBrasilStatus $status): self
    {
        $this->status = $status->name;
        return $this;
    }

    /**
     * @return Calendar
     */
    public function Calendario(): Calendar
    {
        return $this->calendario;
    }

    /**
     * @return Client
     */
    public function Devedor(): Client
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