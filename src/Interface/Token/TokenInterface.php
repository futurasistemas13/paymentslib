<?php

namespace Futuralibs\Paymentslib\Interface\Token;

interface TokenInterface
{
    public function generateToken();

    public function refreshToken();
}