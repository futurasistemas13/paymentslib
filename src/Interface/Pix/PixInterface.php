<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Interface\Pix;


interface PixInterface
{
    public function generateToken();

    public function refreshToken();

    public function generateCharge(PixDataInterface $data) : PixResponseInterface;

    public function queryPix(PixFilterInterface $data = null): iterable;

    public function queryPixId($id): PixResponseInterface;

    public function reviewCharge($id, $data): PixResponseInterface;
}