<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Interface\Pix;


interface PixInterface
{
    public function generateToken();

    public function refreshToken();

    public function generateCharge(PixDataInterface $data);

    public function queryPix(PixFilterInterface $data = null);

    public function queryPixId($id);

    public function reviewCharge($id, $data);
}