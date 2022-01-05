<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Response;

use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Entity\BancoBrasil;
use Futuralibs\Paymentslib\Interface\Pix\PixResponseInterface;

class BancoBrasilResponse extends BancoBrasil implements PixResponseInterface
{

    private string $location;

    private string $txid;

    private int $revisao;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     * @return BancoBrasilResponse
     */
    public function setLocation(string $location): self
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return string
     */
    public function getTxid(): string
    {
        return $this->txid;
    }

    /**
     * @param string $txid
     * @return BancoBrasilResponse
     */
    public function setTxid(string $txid): self
    {
        $this->txid = $txid;
        return $this;
    }

    /**
     * @return int
     */
    public function getRevisao(): int
    {
        return $this->revisao;
    }

    /**
     * @param int $revisao
     * @return BancoBrasilResponse
     */
    public function setRevisao(int $revisao): self
    {
        $this->revisao = $revisao;
        return $this;
    }

}