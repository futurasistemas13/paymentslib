<?php

namespace Futuralibs\Paymentslib;

use Futuralibs\Paymentslib\Interface\Pix\PixInterface;

final class PixPayment implements PixInterface
{

    private PixInterface $pix;

    /**
     * @param PixInterface $pix
     */
    public function __construct(PixInterface $pix)
    {
        $this->pix = $pix;
    }

    /**
     * @return PixInterface
     */
    public function getPix(): PixInterface
    {
        return $this->pix;
    }

    public function generateToken()
    {
        $this->pix->generateToken();
    }

    public function generateCharge()
    {
        $this->pix->generateCharge();
    }

    public function queryPix()
    {
        $this->pix->queryPix();
    }

    public function reviewCharge()
    {
        $this->pix->reviewCharge();
    }

}