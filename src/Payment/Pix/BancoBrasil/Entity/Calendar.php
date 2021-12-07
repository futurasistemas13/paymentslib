<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Entity;

use Futuralibs\Paymentslib\Payment\Pix\AbstractPixEntity;
use Futuralibs\Futurautils\Trait\JsonSerializable\JsonWithOutNull;

class Calendar extends AbstractPixEntity
{
    use JsonWithOutNull;

    private ?\DateTime $criacao = null;

    private ?string $expiracao = null;

    /**
     * @return \DateTime|null
     */
    public function getCriacao(): ?\DateTime
    {
        return $this->criacao;
    }

    /**
     * @param \DateTime|null $criacao
     * @return Calendar
     */
    public function setCriacao(?\DateTime $criacao): self
    {
        $this->criacao = $criacao;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getExpiracao(): ?string
    {
        return $this->expiracao;
    }

    /**
     * @param string|null $expiracao
     * @return Calendar
     */
    public function setExpiracao(?string $expiracao): self
    {
        $this->expiracao = $expiracao;
        return $this;
    }



}