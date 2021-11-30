<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Interface\Pix;


interface PixInterface
{
    public function generateToken();

    public function generateCharge();

    public function queryPix();

    public function reviewCharge();
}