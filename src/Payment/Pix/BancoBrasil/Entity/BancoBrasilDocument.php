<?php

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Futuralibs\Futurautils\Component\Document\Document;

class BancoBrasilDocument extends Document
{

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\NotNull
     */
    private string $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return BancoBrasilDocument
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

}