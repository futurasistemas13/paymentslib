<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Interface\Token;

interface TokenInterface
{
    public function generateToken();

    public function refreshToken();
}