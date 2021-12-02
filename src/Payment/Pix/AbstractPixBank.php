<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Payment\Pix;

use Futuralibs\Paymentslib\Interface\Pix\PixInterface;
use Futuralibs\Paymentslib\Interface\Token\TokenInterface;

abstract class AbstractPixBank implements PixInterface
{
    protected TokenInterface $token;

    /**
     * @param TokenInterface $token
     */
    public function __construct(TokenInterface $token)
    {
        $this->token = $token;
    }

    public function generateToken()
    {
        return $this->token->generateToken();
    }

    public function refreshToken()
    {
        return $this->token->refreshToken();
    }

}