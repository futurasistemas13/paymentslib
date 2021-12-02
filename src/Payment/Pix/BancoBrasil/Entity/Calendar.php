<?php

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Entity;

use Futuralibs\Paymentslib\Payment\Pix\AbstractPixEntity;
use Futuralibs\Futurautils\Trait\JsonSerializable\JsonWithOutNull;

class Calendar extends AbstractPixEntity
{
    use JsonWithOutNull;

    private ?string $create = null;

    private ?string $expiration = null;

    /**
     * @return string|null
     */
    public function getCreate(): ?string
    {
        return $this->create;
    }

    /**
     * @param string|null $create
     * @return Calendar
     */
    public function setCreate(?string $create): self
    {
        $this->create = $create;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getExpiration(): ?string
    {
        return $this->expiration;
    }

    /**
     * @param string|null $expiration
     * @return Calendar
     */
    public function setExpiration(?string $expiration): self
    {
        $this->expiration = $expiration;
        return $this;
    }

}