<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Response;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class BancoBrasilQueryIdResponse extends BancoBrasilResponse
{
    private $pix;

    public function __construct()
    {
        parent::__construct();
        $this->pix = new ArrayCollection();
    }

    /**
     * @return Collection
     */
    public function Pix(): Collection
    {
        return $this->pix;
    }

}