<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Entity;

use Futuralibs\Paymentslib\Type\BancoBrasil\TypeBancoBrasilReturnStatus;

class Returns
{

    #[Serializable()]
    private string $id;

    #[Serializable()]
    private string $rtrId;

    #[Serializable()]
    private string $valor;

    #[Serializable()]
    private Schedule $horario;

    #[Serializable()]
    private string $status;

    public function __construct()
    {
        $this->horario = new Schedule();
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Returns
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getRtrId(): string
    {
        return $this->rtrId;
    }

    /**
     * @param string $rtrId
     * @return Returns
     */
    public function setRtrId(string $rtrId): self
    {
        $this->rtrId = $rtrId;
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
     * @return Returns
     */
    public function setValor(string $valor): self
    {
        $this->valor = $valor;
        return $this;
    }

    /**
     * @return Schedule
     */
    public function Horario(): Schedule
    {
        return $this->horario;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param TypeBancoBrasilReturnStatus $status
     * @return Returns
     */
    public function setStatus(TypeBancoBrasilReturnStatus $status): self
    {
        $this->status = $status->name;
        return $this;
    }

}