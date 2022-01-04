<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Entity;

use Futuralibs\Paymentslib\Payment\Pix\AbstractPixEntity;
use Futuralibs\Paymentslib\Serializer\JsonSerializer;

class Value extends AbstractPixEntity
{

    #[Serializable()]
    private string $original;

    /**
     * @return string
     */
    public function getOriginal(): string
    {
        return $this->value;
    }

    /**
     * @param string $original
     * @return Value
     */
    public function setOriginal(string $original): self
    {
        $this->original = $original;
        return $this;
    }

}